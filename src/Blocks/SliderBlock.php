<?php

namespace KhanoumiAffiliatePartner\Blocks;

class SliderBlock
{

	/**
	 * Block slug.
	 *
	 * @var	string
	 */
	// public static $slug = 'kapp/khanoumi-products-slider';

	public function __construct()
	{
		add_action('init', [$this, 'register']);

		// add_action('enqueue_block_editor_assets', [$this, 'enqueueEditorAssets']);
		// add_action('wp_enqueue_scripts', [$this, 'enqueueFrontendAssets']);
	}

	/**
	 * Registers the block.
	 *
	 * @return	void
	 */
	public function register()
	{
		register_block_type(KAPP()->dir('assets/blocks/slider/build'));

		/* wp_register_script('kapp_slider_editor_script', KAPP()->url('assets/blocks/slider/slider.js'), [], KAPP_VERSION, true);
		wp_register_style('kapp_slider_editor_style', KAPP()->url('assets/blocks/slider/editor.css'), [], KAPP_VERSION);

		if (!is_admin())
		{
			wp_register_script('kapp_slider_frontend_script', KAPP()->url('assets/blocks/slider/frontend.js'), [], KAPP_VERSION, true);
			wp_register_style('kapp_slider_frontend_style', KAPP()->url('assets/blocks/slider/frontend.css'), [], KAPP_VERSION);
		} */
	}

	/**
	 * Enqueues editor assets.
	 *
	 * @return	void
	 */
	public function enqueueEditorAssets()
	{
		// TODO: Do this only on Gutenberg edit pages
		wp_enqueue_script('kapp_slider_editor_script');
	}

	/**
	 * Enqueues frontend assets.
	 *
	 * @return	void
	 */
	public function enqueueFrontendAssets()
	{
		// TODO: Do this only on Gutenberg pages

		wp_enqueue_script('kapp_slider_frontend_script');
		wp_enqueue_style('kapp_slider_frontend_style');
	}
}
