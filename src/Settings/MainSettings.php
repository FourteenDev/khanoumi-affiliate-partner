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
			'page_title' => esc_html__('Khanoumi Affiliate Partner Settings', 'khanoumi-affiliate-partner'),
			'menu_title' => esc_html__('Khanoumi Affiliate', 'khanoumi-affiliate-partner'),
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
			'deema' => esc_html__('Deema Settings', 'khanoumi-affiliate-partner'),
			'style' => esc_html__('Style Settings', 'khanoumi-affiliate-partner'),
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
				'label'   => esc_html__('Deema General Link', 'khanoumi-affiliate-partner'),
				'section' => 'deema',
				'type'    => 'text',
				'default' => '',
				'args'    => [
					'description' => sprintf(
						// translators: %s: Link to an article from Deema.agency.
						nl2br(__("Use <a href=\"%s\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">this guide</a> to find your Deema Affiliate general link. \nNote that you don't need to encode the link, just follow the first 3 steps and paste your general link here. \nIf you leave this field empty, carousel products will have direct links to the Khanoumi website.", 'khanoumi-affiliate-partner')),
						esc_url('https://deema.agency/?p=20332')
					),
				],
			],

			'carousel_primary_color' => [
				'id'      => 'carousel_primary_color',
				'label'   => esc_html__('Carousel Primary Color', 'khanoumi-affiliate-partner'),
				'section' => 'style',
				'type'    => 'colorPicker',
				'default' => '#DB2777',
				'args'    => [],
			],
			'carousel_item_border_color' => [
				'id'      => 'carousel_item_border_color',
				'label'   => esc_html__('Carousel Item Border Color', 'khanoumi-affiliate-partner'),
				'section' => 'style',
				'type'    => 'colorPicker',
				'default' => '#E5E5E5',
				'args'    => [],
			],
			'carousel_item_background_color' => [
				'id'      => 'carousel_item_background_color',
				'label'   => esc_html__('Carousel Item Background Color', 'khanoumi-affiliate-partner'),
				'section' => 'style',
				'type'    => 'colorPicker',
				'default' => '#FFFFFF',
				'args'    => [],
			],
			'carousel_intro_title_color' => [
				'id'      => 'carousel_intro_title_color',
				'label'   => esc_html__('Carousel Intro Title Color', 'khanoumi-affiliate-partner'),
				'section' => 'style',
				'type'    => 'colorPicker',
				'default' => '#FFFFFF',
				'args'    => [
					'description' => esc_html__('Color of the "Buy from Khanoumi" text.', 'khanoumi-affiliate-partner'),
				],
			],
			'carousel_price_color' => [
				'id'      => 'carousel_price_color',
				'label'   => esc_html__('Carousel Price Color', 'khanoumi-affiliate-partner'),
				'section' => 'style',
				'type'    => 'colorPicker',
				'default' => '#000000',
				'args'    => [],
			],
			'carousel_price_striked_color' => [
				'id'      => 'carousel_price_striked_color',
				'label'   => esc_html__('Carousel Price Striked Color', 'khanoumi-affiliate-partner'),
				'section' => 'style',
				'type'    => 'colorPicker',
				'default' => '#A3A3A3',
				'args'    => [
					'description' => esc_html__('Color of the base price when there\'s a discount.', 'khanoumi-affiliate-partner'),
				],
			],
			'carousel_price_discount_color' => [
				'id'      => 'carousel_price_discount_color',
				'label'   => esc_html__('Carousel Price Discount Color', 'khanoumi-affiliate-partner'),
				'section' => 'style',
				'type'    => 'colorPicker',
				'default' => '#FFFFFF',
				'args'    => [],
			],
			'carousel_price_discount_background_color' => [
				'id'      => 'carousel_price_discount_background_color',
				'label'   => esc_html__('Carousel Price Discount Background Color', 'khanoumi-affiliate-partner'),
				'section' => 'style',
				'type'    => 'colorPicker',
				'default' => '#E11D48',
				'args'    => [
					'description' => esc_html__('Background of discount boxes.', 'khanoumi-affiliate-partner'),
				],
			],
		]);
	}
}
