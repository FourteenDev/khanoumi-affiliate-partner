<?php

namespace KhanoumiAffiliatePartner\Helpers;

class FiltersHelper
{
	/**
	 * Returns all available brands.
	 *
	 * @return	array
	 *
	 * @todo	Add `getBrand($id, $nameEn = '', $nameFa = '', $slug = '')`
	 */
	public static function getAllBrands()
	{
		return self::getLocalResourceFile('brands');
	}

	/**
	 * Returns all available categories.
	 *
	 * @return	array
	 *
	 * @todo	Add `getCategory($id, $name = '', $parentId = -1, $slug = '')`
	 */
	public static function getAllCategories()
	{
		return self::getLocalResourceFile('categories');
	}

	/**
	 * Returns all available tags.
	 *
	 * @return	array
	 *
	 * @todo	Add `getTag($id, $name, $slug)`
	 */
	public static function getAllTags()
	{
		return self::getLocalResourceFile('tags');
	}

	/**
	 * Returns the local resource JSON file as an associative array.
	 *
	 * @param	$fileName	File name without `resources/` in the beginning and the `.json` in the end.
	 *
	 * @return	array
	 *
	 * @todo	Replace local resource file with an API.
	 */
	private static function getLocalResourceFile($fileName)
	{
		$path = "resources/$fileName.json";

		if (!file_exists(KAPP()->dir($path)))
		{
			error_log("Could not find $fileName.json file!");
			return [];
		}

		if (empty($result = json_decode(trim(file_get_contents(KAPP()->dir($path))), true)))
		{
			error_log("Invalid $fileName.json file!");
			return [];
		}

		return $result;
	}
}
