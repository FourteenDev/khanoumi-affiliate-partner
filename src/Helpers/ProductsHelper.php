<?php

namespace KhanoumiAffiliatePartner\Helpers;

class ProductsHelper
{
	/**
	 * Returns Khanoumi products in carousel or grid form.
	 *
	 * @param	array	$inputArgs	An associative array of user defined arguments. Acceptable keys:
	 * 	- `display`		string		Accetable values are `carousel` and `grid`. Defaults to `carousel`.
	 * 	- `category`	int			Defaults to 0.
	 * 	- `tag`			int			Defaults to 0.
	 * 	- `brand`		int			Defaults to 0.
	 * 	- `limit`		int			Defaults to 10.
	 * 	- `page`		int			Defaults to 1.
	 * 	- `speed`		int			Slider speed in milliseconds. Only works when `$display` is equal to 'carousel'. Minimum 500 and default 3000.
	 *	- `intro`		bool		Display first slide (introduction slide) in carousel. Defaults to true.
	 *
	 * @return	string				The HTML code of the products view (or the error).
	 */
	public static function getProducts($inputArgs = [])
	{
		$display  = !empty($inputArgs['display']) ? esc_attr($inputArgs['display']) : 'carousel';
		$category = !empty($inputArgs['category']) ? intval($inputArgs['category']) : 0;
		$tag      = !empty($inputArgs['tag']) ? intval($inputArgs['tag']) : 0;
		$brand    = !empty($inputArgs['brand']) ? intval($inputArgs['brand']) : 0;
		$limit    = !empty($inputArgs['limit']) ? intval($inputArgs['limit']) : 10;
		$page     = !empty($inputArgs['page']) ? intval($inputArgs['page']) : 1;
		$speed    = !empty($inputArgs['speed']) ? max(500, absint($inputArgs['speed'])) : 3000;
		$intro    = isset($inputArgs['intro']) ? filter_var($inputArgs['intro'], FILTER_VALIDATE_BOOLEAN) : true;

		$products = get_transient("khanoumi_products_{$category}_{$tag}_{$brand}_{$limit}_{$page}");
		if (empty($products))
		{
			$products = self::fetchProductsViaAPI($category, $tag, $brand, $limit, $page);
			if (empty($products)) return __('No products were found!', 'khanoumi-affiliate-partner');

			if (empty($products['isSuccess']) || empty($products['data']) || empty($products['data']['products']))
			{
				error_log(print_r($products, true));
				return __('Invalid products! See log file for more details.', 'khanoumi-affiliate-partner');
			}

			if (empty($products['data']['products']['items']))
				return __('No products found with the given filters.', 'khanoumi-affiliate-partner');

			$products = DeemaHelper::addProductLinksToApiResponse($products);
			if (empty($products))
			{
				error_log(print_r($products, true));
				return __('Unable to process products! See log file for more details.', 'khanoumi-affiliate-partner');
			}

			set_transient("khanoumi_products_{$category}_{$tag}_{$brand}_{$limit}_{$page}", $products, 12 * HOUR_IN_SECONDS);
		}

		$outputArgs = [
			'products' => $products['data']['products']['items'],
			'speed'    => $speed,
			'intro'    => $intro,
			'colors'   => [
				'--kappCarouselPrimaryColor'                 => esc_attr(KAPP()->option('carousel_primary_color')),
				'--kappCarouselItemBorderColor'              => esc_attr(KAPP()->option('carousel_item_border_color')),
				'--kappCarouselItemBackgroundColor'          => esc_attr(KAPP()->option('carousel_item_background_color')),
				'--kappCarouselIntroTitleColor'              => esc_attr(KAPP()->option('carousel_intro_title_color')),
				'--kappCarouselPriceColor'                   => esc_attr(KAPP()->option('carousel_price_color')),
				'--kappCarouselPriceStrikedColor'            => esc_attr(KAPP()->option('carousel_price_striked_color')),
				'--kappCarouselPriceDiscountColor'           => esc_attr(KAPP()->option('carousel_price_discount_color')),
				'--kappCarouselPriceDiscountBackgroundColor' => esc_attr(KAPP()->option('carousel_price_discount_background_color')),
				'--kappCarouselVerticalPadding'              => intval(KAPP()->option('carousel_vertical_padding')) ? intval(KAPP()->option('carousel_vertical_padding')) . 'px' : '',
				'--kappCarouselHorizontalPadding'            => intval(KAPP()->option('carousel_horizontal_padding')) ? intval(KAPP()->option('carousel_horizontal_padding')) . 'px' : '',
				'--kappCarouselItemPadding'                  => intval(KAPP()->option('carousel_item_padding')) ? intval(KAPP()->option('carousel_item_padding')) . 'px' : '',
				'--kappCarouselItemMinHeight'                => intval(KAPP()->option('carousel_item_min_height')) ? intval(KAPP()->option('carousel_item_min_height')) . 'px' : '',
				'--kappCarouselItemMaxHeight'                => intval(KAPP()->option('carousel_item_max_height')) ? intval(KAPP()->option('carousel_item_max_height')) . 'px' : '',
			]
		];
		$output     = KAPP()->view($display === 'grid' ? 'public.shortcodes.get-products-grid' : 'public.shortcodes.get-products-carousel', $outputArgs, false);

		/**
		 * Filters the output of the `getProducts()` helper.
		 *
		 * @param	string	$output		Output HTML.
		 * @param	array	$outputArgs	Output Arguments. Keys:
	 	 * 	- `products`	array	Products to display in the HTML.
	 	 * 	- `speed`		int		Slider speed in milliseconds.
	 	 * 	- `intro`		bool	Display first slide (introduction slide) in carousel.
	 	 * 	- `colors`		array	Colors used in the carousel.
		 * @param	array	$inputArgs		Input arguments (raw).
		 */
		return apply_filters('kapp_get_products_output', $output, $outputArgs, $inputArgs);
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
