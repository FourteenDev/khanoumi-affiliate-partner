<?php

namespace KhanoumiAffiliatePartner\Shortcodes;

use KhanoumiAffiliatePartner\Helpers\ProductsHelper;

class GetProductsViaREST
{
	public static $instance = null;

	public static function getInstance()
	{
		self::$instance === null && self::$instance = new self;
		return self::$instance;
	}

	public function __construct()
	{
		add_shortcode('khanoumi_products', [$this, 'run']);
	}

	/**
	 * Runs the shortcode.
	 *
	 * @param	array	$atts
	 *
	 * @return	string
	 */
	public function run($atts)
	{
		$atts = shortcode_atts(
			[
				'show'  => 'carousel',
				'cat'   => '',
				'tag'   => '',
				'brand' => '',
				'limit' => '10',
				'page' => '1',
			],
			$atts,
			'khanoumi_products'
		);

		return ProductsHelper::getProducts($atts['show'], $atts['cat'], $atts['tag'], $atts['brand'], $atts['limit'], $atts['page']);
	}
}
