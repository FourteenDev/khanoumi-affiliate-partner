<?php

namespace KhanoumiAffiliatePartner\Blocks;

use KhanoumiAffiliatePartner\Helpers\FiltersHelper;

class SliderBlock
{
	/**
	 * Block handle.
	 *
	 * It's the same name from `block.json`, but with a '-' instead of '/'.
	 *
	 * @var	string
	 */
	public static $handle = 'kapp-khanoumi-products-slider';

	public function __construct()
	{
		add_action('init', [$this, 'register']);

		add_action('enqueue_block_editor_assets', [$this, 'addInlineScript']);
	}

	/**
	 * Registers the block.
	 *
	 * @return	void
	 */
	public function register()
	{
		register_block_type(KAPP()->dir('assets/blocks/slider/build'));
	}

	/**
	 * Adds more data to the block.
	 *
	 * @return	void
	 *
	 * @source	https://StackOverflow.com/a/73551111/
	 */
	public function addInlineScript()
	{
		$data = '
			const allCategories = ' . json_encode(FiltersHelper::getAllCategories()) . ';
			const allTags       = ' . json_encode(FiltersHelper::getAllTags()) . ';
			const allBrands     = ' . json_encode(FiltersHelper::getAllBrands()) . ';
		';

		wp_add_inline_script(self::$handle . '-editor-script', $data, 'before');
	}
}
