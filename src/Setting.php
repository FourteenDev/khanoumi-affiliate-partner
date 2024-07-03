<?php

namespace KhanoumiAffiliatePartner;

class Setting
{
	public static $instance = null;

	private $menuSlug    = KAPP_SETTINGS_SLUG . '_settings';
	private $optionsName = KAPP_SETTINGS_SLUG . '_options';

	public static function getInstance()
	{
		self::$instance === null && self::$instance = new self;
		return self::$instance;
	}

	public function __construct()
	{
		add_action('admin_menu', [$this, 'createAdminMenu']);
		add_action('admin_init', [$this, 'registerSettings']);

		add_filter('plugin_action_links_' . KAPP_BASENAME, [$this, 'actionLinks']);
	}

	/**
	 * Creates a menu in admin dashboard.
	 *
	 * @return	void
	 *
	 * @hooked	action: `admin_menu` - 10
	 */
	public function createAdminMenu()
	{
		add_menu_page(
			esc_html__('Khanoumi Affiliate Partner Settings', KAPP_TEXT_DOMAIN),
			esc_html__('Khanoumi Affiliate', KAPP_TEXT_DOMAIN),
			'manage_options',
			$this->menuSlug,
			[$this, 'displaySettingsContent'],
			'dashicons-products'
		);
	}

	/**
	 * Outputs the content for settings page.
	 *
	 * @return	void
	 */
	public function displaySettingsContent()
	{
		$activeTab = (!empty($_GET['tab']) && array_key_exists($_GET['tab'], $this->getTabs())) ? sanitize_key($_GET['tab']) : 'general';
		$args      = [
			'activeTab' => $activeTab,
			'tabs'      => $this->getTabs(),
		];

		KAPP()->view('admin.settings.wrapper', $args);
	}

	/**
	 * Registers plugin settings in the admin menu.
	 *
	 * @return	void
	 *
	 * @hooked	action: `admin_init` - 10
	 */
	public function registerSettings()
	{
		register_setting("{$this->menuSlug}_group", $this->optionsName);

		foreach ($this->getTabs() as $tabSlug => $tabLabel)
			add_settings_section("{$this->menuSlug}_$tabSlug", $tabLabel, null, $this->menuSlug);

		$fields = [
			'deema_general_link' => [
				'id'      => 'deema_general_link',
				'label'   => esc_html__('Deema General Link', KAPP_TEXT_DOMAIN),
				'section' => 'general',
				'type'    => 'text',
				'default' => '',
				'args'    => [
					'description' => esc_html__('Deema Affiliate General Link. If you leave this field empty, carousel/grid products will have direct links to the Khanoumi website.', KAPP_TEXT_DOMAIN),
				],
			],
		];

		foreach ($fields as $field)
		{
			$callback = !empty($field['callback']) ? $field['callback'] : [$this, $field['type'] . 'FieldCallback'];

			add_settings_field(
				$field['id'],
				$field['label'],
				$callback,
				$this->menuSlug,
				"{$this->menuSlug}_" . $field['section'],
				['id' => $field['id'], 'default' => $field['default']] + $field['args']
			);
		}
	}

	/**
	 * Returns tabs for the settings page.
	 *
	 * @return	array
	 */
	public function getTabs()
	{
		$tabs = [
			'general' => esc_html__('General Settings', KAPP_TEXT_DOMAIN),
		];

		return apply_filters('kapp_settings_tabs', $tabs);
	}

	/**
	 * Outputs a text input field.
	 *
	 * @param	array	$args
	 *
	 * @return	string
	 */
	public function textFieldCallback($args)
	{
		$id = !empty($args['id']) ? $args['id'] : '';
		if (empty($id)) return;

		KAPP()->view('admin.settings.fields.text', $this->getSettingsValue($id, $args));
	}

	/**
	 * Returns field's value.
	 *
	 * @param	string	$key
	 * @param	array	$args
	 *
	 * @return	string
	 */
	private function getSettingsValue($key, $args)
	{
		$default = !empty($args['default']) ? $args['default'] : '';

		$value = KAPP()->option($key);
		if (empty($value)) $value = $default;

		return [
			'id'          => "{$this->optionsName}_$key",
			'name'        => "{$this->optionsName}[$key]",
			'description' => !empty($args['description']) ? trim($args['description']) : '',
			'value'       => $value,
		];
	}

	/**
	 * Adds plugin action links to the plugins page.
	 *
	 * @param	array	$links
	 *
	 * @return	array
	 *
	 * @hooked	filter: `plugin_action_links_{KAPP_BASENAME}` - 10
	 */
	public function actionLinks($links)
	{
		$links[] = '<a href="' . get_admin_url(null, "admin.php?page={$this->menuSlug}") . '">' . esc_html__('Settings', KAPP_TEXT_DOMAIN) . '</a>';
		return $links;
	}
}
