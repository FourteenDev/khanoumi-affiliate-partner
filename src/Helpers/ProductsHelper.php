<?php

namespace KhanoumiAffiliatePartner\Helpers;

class ProductsHelper
{
	/**
	 * Returns Khanoumi products in carousel or grid form.
	 *
	 * @param	array	$args		An associative array of user defined arguments. Acceptable keys:
	 * 	- `display` : Accetable values are `carousel` and `grid`. Defaults to `carousel`.
	 * 	- `category`: Defaults to 0.
	 * 	- `tag`     : Defaults to 0.
	 * 	- `brand`   : Defaults to 0.
	 * 	- `limit`   : Defaults to 10.
	 * 	- `page`    : Defaults to 1.
	 * 	- `speed`   : Slider speed in milliseconds. Only works when `$display` is equal to 'carousel'. Minimum 500 and default 3000.
	 *
	 * @return	string				The HTML code of the products view (or the error).
	 */
	public static function getProducts($args = [])
	{
		$display  = !empty($args['display']) ? esc_attr($args['display']) : 'carousel';
		$category = !empty($args['category']) ? intval($args['category']) : 0;
		$tag      = !empty($args['tag']) ? intval($args['tag']) : 0;
		$brand    = !empty($args['brand']) ? intval($args['brand']) : 0;
		$limit    = !empty($args['limit']) ? intval($args['limit']) : 10;
		$page     = !empty($args['page']) ? intval($args['page']) : 1;
		$speed    = !empty($args['speed']) ? max(500, absint($args['speed'])) : 3000;

		$products = get_transient("khanoumi_products_{$category}_{$tag}_{$brand}_{$limit}_{$page}");
		if (empty($products))
		{
			$products = self::fetchProductsViaAPI($category, $tag, $brand, $limit, $page);
			if (empty($products)) return __('No products were found!', KAPP_TEXT_DOMAIN);

			if (empty($products['isSuccess']) || empty($products['data']) || empty($products['data']['products']) || empty($products['data']['products']['items']))
			{
				error_log(print_r($products, true));
				return __('Invalid products! See log file for more details.', KAPP_TEXT_DOMAIN);
			}

			$products = DeemaHelper::addProductLinksToApiResponse($products);
			if (empty($products))
			{
				error_log(print_r($products, true));
				return __('Unable to process products! See log file for more details.', KAPP_TEXT_DOMAIN);
			}

			set_transient("khanoumi_products_{$category}_{$tag}_{$brand}_{$limit}_{$page}", $products, 12 * HOUR_IN_SECONDS);
		}

		$output = $display === 'grid' ? KAPP()->view('public.shortcodes.get-products-grid', ['products' => $products['data']['products']['items']], false) : KAPP()->view('public.shortcodes.get-products-carousel', ['products' => $products['data']['products']['items'], 'speed' => $speed], false);

		/**
		 * Filters the output of the `getProducts()` helper.
		 *
		 * @param	string	$output		Output HTML.
		 * @param	array	$products	Products to display in the HTML.
		 * @param	int		$speed		Carousel speed.
		 * @param	array	$args		Input arguments (raw).
		 */
		return apply_filters('kapp_get_products_output', $output, $products['data']['products']['items'], $speed, $args);
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
	public static function fetchProductsViaAPI($category = 0, $tag = 0, $brand = 0, $limit = 0, $page = 0)
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
