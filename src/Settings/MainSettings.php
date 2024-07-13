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
						'با استفاده از <a href="%s" target="_blank" rel="noopener noreferrer nofollow">این آموزش</a> می‌توانید لینک عمومی دیما افیلیت خود را پیدا کنید. <br />
دقت داشته باشید که نیاز نیست لینک را انکد کنید، فقط 3 مرحله‌ی اول آموزش را طی کرده و لینک عمومی خود را اینجا وارد کنید. <br />
اگر این فیلد را خالی بگذارید، محصولات کروسل لینک مستقیم به سایت خانومی خواهند داشت.',
						esc_url('https://deema.agency/?p=20332')
					),
				],
			],
		]);
	}
}
