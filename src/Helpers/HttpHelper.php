<?php

namespace KhanoumiAffiliatePartner\Helpers;

class HttpHelper
{
	/**
	 * Performs a normal `wp_remote_get()` and returns the validated result.
	 *
	 * @param	string	$url
	 * @param	array	$args
	 * @param	bool	$isJSON		Is the retrurned result in JSON format?
	 *
	 * @return	mixed
	 */
	public static function wpRemoteGet($url, $args = [], $isJSON = false)
	{
		add_filter('http_request_timeout', [HttpHelper::class, 'getHttpRequestTimeout']);
		$response = \wp_remote_get($url, $args);
		remove_filter('http_request_timeout', [HttpHelper::class, 'getHttpRequestTimeout']);

		if (is_wp_error($response)) return null;

		$results = wp_remote_retrieve_body($response);
		if (is_wp_error($results)) return null;

		if ($isJSON) $results = json_decode($results, true);
		if (empty($results)) return null;

		return $results;
	}

	/**
	 * Returns the number `30` for the request timeout.
	 *
	 * @return	int
	 */
	public static function getHttpRequestTimeout()
	{
		return 30;
	}
}
