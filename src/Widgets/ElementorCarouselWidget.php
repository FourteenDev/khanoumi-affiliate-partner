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
			'products_section',
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

		$tags = ['0' => esc_html__('All', 'khanoumi-affiliate-partner')];
		foreach (FiltersHelper::getAllTags() as $tag)
			$tags[$tag['id']] = $tag['name'];
		$this->add_control(
			'tag',
			[
				'type'    => \Elementor\Controls_Manager::SELECT,
				'label'   => esc_html__('Tag', 'khanoumi-affiliate-partner'),
				'options' => $tags,
				'default' => '0',
			]
		);

		$brands = ['0' => esc_html__('All', 'khanoumi-affiliate-partner')];
		foreach (FiltersHelper::getAllBrands() as $brand)
			$brands[$brand['id']] = $brand['name_per'];
		$this->add_control(
			'brand',
			[
				'type'    => \Elementor\Controls_Manager::SELECT,
				'label'   => esc_html__('Brand', 'khanoumi-affiliate-partner'),
				'options' => $brands,
				'default' => '0',
			]
		);

		$this->add_control(
			'limit',
			[
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label' => esc_html__('Limit', 'khanoumi-affiliate-partner'),
				'placeholder' => esc_html__('Limit', 'khanoumi-affiliate-partner'),
				'min' => 1,
				'max' => 50,
				'step' => 1,
				'default' => 10,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'slider_section',
			[
				'label' => esc_html__('Slider Settings', 'khanoumi-affiliate-partner'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'speed',
			[
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label' => esc_html__('Slider speed (milliseconds)', 'khanoumi-affiliate-partner'),
				'placeholder' => '3000',
				'min' => 500,
				'step' => 500,
				'default' => 3000,
			]
		);

		$this->add_control(
			'intro',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__('Display first slide (introduction)', 'khanoumi-affiliate-partner'),
				'options' => [
					'yes' => [
						'title' => esc_html__('Yes', 'khanoumi-affiliate-partner'),
						'icon' => 'eicon-check',
					],
					'no' => [
						'title' => esc_html__('No', 'khanoumi-affiliate-partner'),
						'icon' => 'eicon-close',
					],
				],
				'default' => 'yes',
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
			'tag'      => !empty($settings['tag']) ? intval($settings['tag']) : 0,
			'brand'    => !empty($settings['brand']) ? intval($settings['brand']) : 0,
			'limit'    => !empty($settings['limit']) ? intval($settings['limit']) : 10,
			'speed'    => !empty($settings['speed']) ? intval($settings['speed']) : 3000,
			'intro'    => !empty($settings['intro']) && $settings['intro'] === 'no' ? false : true,
		]);
	}
}
