<?php

namespace KhanoumiAffiliatePartner\Settings;

class MainSettings extends Base
{
	public static $instance = null;

	protected $menuSlug = KAPP_SETTINGS_SLUG . '_settings';

	public static function getInstance()
	{
		self::$instance === null && self::$instance = new self;
		return self::$instance;
	}

	/**
	 * Adds the submenu.
	 *
	 * @param	array	$submenus
	 *
	 * @return	array
	 *
	 * @hooked	filter: `kapp_settings_submenus` - 10
	 */
	public function addSubmenu($submenus)
	{
		$submenus['settings'] = [
			'page_title' => esc_html__('Khanoumi Affiliate Partner Settings', KAPP_TEXT_DOMAIN),
			'menu_title' => esc_html__('Khanoumi Affiliate', KAPP_TEXT_DOMAIN),
			'callback'   => [$this, 'displayContent'],
			'position'   => 0,
		];

		return $submenus;
	}

	/**
	 * Returns tabs for this submenu.
	 *
	 * @return	array
	 */
	public function getTabs()
	{
		return apply_filters('kapp_settings_main_tabs', [
			'deema' => esc_html__('Deema Settings', KAPP_TEXT_DOMAIN),
		]);
	}

	/**
	 * Returns fields for this submenu.
	 *
	 * @return	array
	 */
	public function getFields()
	{
		return apply_filters('kapp_settings_main_fields', [
			'deema_general_link' => [
				'id'      => 'deema_general_link',
				'label'   => esc_html__('Deema General Link', KAPP_TEXT_DOMAIN),
				'section' => 'deema',
				'type'    => 'text',
				'default' => '',
				'args'    => [
					'description' => sprintf(
						// translators: %s: Link to an article from Deema.agency.
						__('Use <a href="%s" target="_blank" rel="noopener noreferrer nofollow">this guide</a> to find your Deema Affiliate general link. <br />
Note that you don\'t need to encode the link, just follow the first 3 steps and paste your general link here. <br />
If you leave this field empty, carousel products will have direct links to the Khanoumi website.', KAPP_TEXT_DOMAIN),
						esc_url('https://deema.agency/?p=20332')
					),
				],
			],
		]);
	}
}
