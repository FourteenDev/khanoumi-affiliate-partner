<?php

namespace KhanoumiAffiliatePartner\Widgets;

use KhanoumiAffiliatePartner\Helpers\FiltersHelper;
use KhanoumiAffiliatePartner\Helpers\ProductsHelper;

class ElementorCarouselWidget extends \Elementor\Widget_Base
{
	/**
	 * Returns widget name.
	 *
	 * @return	string	Widget name.
	 */
	public function get_name()
	{
		return 'kapp_products_carousel';
	}

	/**
	 * Returns widget title.
	 *
	 * @return	string	Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Khanoumi Products Carousel', 'khanoumi-affiliate-partner');
	}

	/**
	 * Returns widget icon.
	 *
	 * @return	string	Widget icon.
	 */
	public function get_icon()
	{
		return 'kapp-elementor-icon';
	}

	/**
	 * Returns the list of categories that the widget belongs to.
	 *
	 * @return	array	Widget categories.
	 */
	public function get_categories()
	{
		return ['general'];
	}

	/**
	 * Returns the list of keywords that the widget belongs to.
	 *
	 * @return	array	Widget keywords.
	 */
	public function get_keywords()
	{
		return ['khanoumi', 'slider', 'carousel', 'slick'];
	}

	/**
	 * Adds input fields for customizing widget settings.
	 *
	 * @return	void
	 */
	protected function register_controls()
	{
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__('Products', 'khanoumi-affiliate-partner'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$categories = ['0' => esc_html__('All', 'khanoumi-affiliate-partner')];
		foreach (FiltersHelper::getAllCategories() as $category)
			$categories[$category['id']] = $category['name'];

		$this->add_control(
			'category',
			[
				'type'    => \Elementor\Controls_Manager::SELECT,
				'label'   => esc_html__('Category', 'khanoumi-affiliate-partner'),
				'options' => $categories,
				'default' => '0',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Renders widget output on the frontend.
	 *
	 * @return	void
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		echo ProductsHelper::getProducts([
			'category' => !empty($settings['category']) ? intval($settings['category']) : 0,
		]);
	}
}
