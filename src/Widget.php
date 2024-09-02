<?php

namespace KhanoumiAffiliatePartner;

use KhanoumiAffiliatePartner\Widgets\ElementorCarouselWidget;
use KhanoumiAffiliatePartner\Widgets\ProductsCarouselWidget;

class Widget
{
	public static $instance = null;

	public static function getInstance()
	{
		self::$instance === null && self::$instance = new self;
		return self::$instance;
	}

	public function __construct()
	{
		new ProductsCarouselWidget();

		add_action('elementor/widgets/register', [$this, 'registerElementorWidget']);
	}

	/**
	 * Registers Elementor carousel widget.
	 *
	 * @param	\Elementor\Widgets_Manager	$widgetsManager		Elementor widgets manager.
	 *
	 * @return	void
	 */
	public function registerElementorWidget($widgetsManager)
	{
		$widgetsManager->register(new ElementorCarouselWidget());
	}
}
