<?php

namespace KhanoumiAffiliatePartner\Helpers;

class ProductsHelper
{
	/**
	 * Returns Khanoumi products in carousel or grid form.
	 *
	 * @param	string	$display	Accetable values are `carousel` and `grid`.
	 * @param	int		$category
	 * @param	int		$tag
	 * @param	int		$brand
	 * @param	int		$limit
	 * @param	int		$page
	 *
	 * @return	string				The HTML code of the products view (or the error).
	 */
	public static function getProducts($display = 'carousel', $category = 0, $tag = 0, $brand = 0, $limit = 10, $page = 1)
	{
		$category = intval($category);
		$tag      = intval($tag);
		$brand    = intval($brand);
		$limit    = intval($limit);
		$page     = intval($page);

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

		if ($display === 'grid')
			return KAPP()->view('public.shortcodes.get-products-grid', ['products' => $products['data']['products']['items']], false);
		else
			return KAPP()->view('public.shortcodes.get-products-carousel', ['products' => $products['data']['products']['items']], false);
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
