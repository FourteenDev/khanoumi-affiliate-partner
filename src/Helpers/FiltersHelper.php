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
		return self::sortByKey(self::getLocalResourceFile('brands'), 'name_per');
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
		return self::sortByKey(self::getLocalResourceFile('categories'), 'name');
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
		return self::sortByKey(self::getLocalResourceFile('tags'), 'name');
	}

	/**
	 * Returns the local resource JSON file as an associative array.
	 *
	 * @param	string	$fileName	File name without `resources/` in the beginning and the `.json` in the end.
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

	/**
	 * Sorts (Ascending) the given associative array by the selected key.
	 *
	 * @param	array	$array
	 * @param	string	$key	Key to sort the array based on.
	 *
	 * @return	array			Sorted array.
	 */
	private static function sortByKey($array, $key)
	{
		uasort($array, function ($a, $b) use ($key) {
            if (!isset($a[$key])) {
                return -1;
            }
			if (!isset($b[$key])) {
                return 1;
            }

            return $a[$key] <=> $b[$key];
        });

		// uasort will add an extra **string** key to each item (which shows their old index before sorting)
		// Let's remove them since they'll cause issues in JS (in .map() function)
		return array_values($array);
	}
}
