<?php

namespace KhanoumiAffiliatePartner\Widgets;

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
	 * Renders widget output on the frontend.
	 *
	 * @return	void
	 */
	protected function render()
	{
		echo ProductsHelper::getProducts();
	}
}
