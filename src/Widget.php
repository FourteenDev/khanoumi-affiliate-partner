<?php

namespace KhanoumiAffiliatePartner;

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
	}
}
