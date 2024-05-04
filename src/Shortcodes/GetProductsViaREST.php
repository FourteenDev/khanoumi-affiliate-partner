<?php

namespace KhanoumiAffiliatePartner\Shortcodes;

use KhanoumiAffiliatePartner\Helpers\HttpHelper;

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

		if (isset($_GET['refresh_products']))
			delete_transient('khanoumi_products');

		$products = get_transient('khanoumi_products');
		if (empty($products))
		{
			$products = $this->getProductsViaREST($atts['cat'], $atts['tag'], $atts['brand'], $atts['limit'], $atts['page']);
			set_transient('khanoumi_products', $products, 12 * HOUR_IN_SECONDS);
		}

		if (empty($products)) return '';
		if (empty($products['isSuccess'])) return '';
		if (empty($products['data']) || empty($products['data']['products'])) return '';

		if ($atts['show'] === 'album')
			return KAPP()->view('public.shortcodes.get-products-album', ['products' => $products['data']['products']], false);
		else
			return KAPP()->view('public.shortcodes.get-products-carousel', ['products' => $products['data']['products']], false);
	}

	/**
	 * Fetches Khanoumi products via REST API.
	 *
	 * @param	int			$category
	 * @param	int			$tag
	 * @param	int			$brand
	 * @param	int			$limit
	 * @param	int			$page
	 *
	 * @return	array|null
	 */
	private function getProductsViaREST($category = 0, $tag = 0, $brand = 0, $limit = 0, $page = 0)
	{
		$requestURL = 'https://khanoumi.com/api/ntl/v1/products?';
		if (intval($category))
			$requestURL .= 'cat_id=' . intval($category) . '&';
		if (intval($tag))
			$requestURL .= 'tag_id=' . intval($tag) . '&';
		if (intval($brand))
			$requestURL .= 'brand_id=' . intval($brand) . '&';
		if (intval($limit))
			$requestURL .= 'page_size=' . intval($limit) . '&';
		if (intval($page))
			$requestURL .= 'page_number=' . intval($page) . '&';

		return HttpHelper::wpRemoteGet($requestURL, [], true);
	}
}
