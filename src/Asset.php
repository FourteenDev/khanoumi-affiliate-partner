<?php

namespace KhanoumiAffiliatePartner;

class Asset
{
	public static $instance = null;

	public static function getInstance()
	{
		self::$instance === null && self::$instance = new self;
		return self::$instance;
	}

	public function __construct()
	{
		add_action('admin_enqueue_scripts', [$this, 'enqueueAdminScripts']);
		add_action('elementor/editor/after_enqueue_styles', [$this, 'enqueueAdminScripts']);

		add_action('wp_enqueue_scripts', [$this, 'enqueuePublicScripts']);
	}

	/**
	 * Enqueues admin styles and scripts.
	 *
	 * @param	string	$hookSuffix		Current admin page.
	 *
	 * @return	void
	 *
	 * @hooked	action: `admin_enqueue_scripts` - 10
	 */
	public function enqueueAdminScripts($hookSuffix)
	{
		wp_enqueue_style('kapp_admin', KAPP()->url('assets/admin/css/admin.css'), [], KAPP_VERSION);

		$dependencies = ['jquery'];
		if ($hookSuffix === 'toplevel_page_kapp_settings')
		{
			wp_enqueue_style('wp-color-picker');
			$dependencies[] = 'wp-color-picker';
		}

		wp_enqueue_script('kapp_admin', KAPP()->url('assets/admin/js/admin.js'), $dependencies, KAPP_VERSION, true);
	}

	/**
	 * Enqueues public styles and scripts.
	 *
	 * @return	void
	 *
	 * @hooked	action: `wp_enqueue_scripts` - 10
	 */
	public function enqueuePublicScripts()
	{
		wp_enqueue_style('slick_theme', KAPP()->url('assets/public/css/slick-theme.css'), [], KAPP_VERSION, '');
		wp_enqueue_style('slick', KAPP()->url('assets/public/css/slick.css'), [], KAPP_VERSION, '');
		wp_enqueue_style('kapp_public', KAPP()->url('assets/public/css/public.css'), [], KAPP_VERSION, '');

		wp_enqueue_script('slick', KAPP()->url('assets/public/js/slick.min.js'), ['jquery'], KAPP_VERSION, true);
		wp_enqueue_script('kapp_public', KAPP()->url('assets/public/js/public.js'), [], KAPP_VERSION, true);
	}
}
