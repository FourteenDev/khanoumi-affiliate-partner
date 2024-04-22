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
		add_action('wp_enqueue_scripts', [$this, 'enqueuePublicScripts']);
	}

	/**
	 * Enqueues admin styles and scripts.
	 *
	 * @return	void
	 *
	 * @hooked	action: `admin_enqueue_scripts` - 10
	 */
	public function enqueueAdminScripts()
	{
		wp_enqueue_style('kapp_admin', KAPP()->url('assets/admin/css/admin.css'), [], KAPP_VERSION);
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
		wp_enqueue_style('kapp_public', KAPP()->url('assets/public/css/public.css'), [], KAPP_VERSION);
	}
}
