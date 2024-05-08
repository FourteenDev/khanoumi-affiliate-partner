<?php

namespace KhanoumiAffiliatePartner\Helpers;

class DeemaHelper
{
	/**
	 * Adds Deema affiliate links to Khanoumi API's response array.
	 *
	 * @param	array		$products
	 *
	 * @return	array|null				Same response, with new `fullLink` and `deemaLink` keys added to the `data`->`products`->`items` array.
	 */
	public static function addProductLinksToApiResponse($products)
	{
		if (empty($products)) return null;
		if (empty($products['isSuccess']) || empty($products['data']) || empty($products['data']['products']) || empty($products['data']['products']['items'])) return null;

		for ($i = 0; $i < count($products['data']['products']['items']); $i++)
		{
			$products['data']['products']['items'][$i]['fullLink']  = 'https://khanoumi.com/products/' . $products['data']['products']['items'][$i]['slug'] . '/';
			$products['data']['products']['items'][$i]['deemaLink'] = self::generateDeemaProductLink($products['data']['products']['items'][$i]['fullLink']);
		}

		return $products;
	}

	/**
	 * Generates a Deema affiliate link for a product using the Khanoumi's general link.
	 *
	 * @param	string	$productLink
	 *
	 * @return	string
	 */
	public static function generateDeemaProductLink($productLink)
	{
		if (empty($productLink)) return '';

		$base64Encoded        = strtr(base64_encode($productLink), '+/', '-_');
		$urlSafeBase64Encoded = str_replace('=', '', $base64Encoded);

		return esc_url("https://deemanetwork.com/click/d/ce41dc83_d6d8_4cf4_83c5_4a85d6d464b5/$urlSafeBase64Encoded");
	}
}
