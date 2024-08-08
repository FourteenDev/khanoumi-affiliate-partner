<?php

namespace KhanoumiAffiliatePartner\Shortcodes;

use KhanoumiAffiliatePartner\Helpers\ProductsHelper;

class KhanoumiProducts
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
				'display'  => 'carousel',
				'category' => 0,
				'tag'      => 0,
				'brand'    => 0,
				'limit'    => 10,
				'page'     => 1,
				'speed'    => 3000,
				'intro'    => true,
			],
			$atts,
			'khanoumi_products'
		);

		return ProductsHelper::getProducts($atts);
	}
}
