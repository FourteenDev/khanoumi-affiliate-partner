<?php

namespace KhanoumiAffiliatePartner\Settings;

class ShortcodeGeneratorSettings extends Base
{
	public static $instance = null;

	protected $menuSlug = KAPP_SETTINGS_SLUG . '_shortcode_generator';

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
		$submenus['shortcode_generator'] = [
			'page_title' => esc_html__('Shortcode Generator', 'khanoumi-affiliate-partner'),
			'menu_title' => esc_html__('Shortcode Generator', 'khanoumi-affiliate-partner'),
			'callback'   => [$this, 'displayContent'],
			'position'   => 0,
		];

		return $submenus;
	}

	/**
	 * Outputs the content for this submenu.
	 *
	 * @return	void
	 */
	public function displayContent()
	{
		$result = ['status' => '', 'result' => ''];
		if (!empty($_POST['submit']))
			$result = $this->generateShortcode();

		KAPP()->view('admin.settings.shortcode-generator', [
			'error'     => $result['status'] === 'error' ? trim($result['result']) : '',
			'shortcode' => $result['status'] === 'success' ? trim($result['result']) : '',
		]);
	}

	/**
	 * Generates the shortcode.
	 *
	 * @return	array	Format: `['status' => 'success/error', 'result' => '{Shortcode}/{ErrorMessage}']`.
	 */
	function generateShortcode()
	{
		if (!isset($_POST['kapp_shortcode_generator_nonce']) || !wp_verify_nonce($_POST['kapp_shortcode_generator_nonce'], 'kapp_shortcode_generator'))
			return ['status' => 'error', 'result' => __('Invalid Nonce!', 'khanoumi-affiliate-partner')];

		$shortcode = '[khanoumi_products';
		$shortcode .= !empty($_POST['shortcode-category']) ? ' category=' . intval($_POST['shortcode-category']) : '';
		$shortcode .= !empty($_POST['shortcode-tag']) ? ' tag=' . intval($_POST['shortcode-tag']) : '';
		$shortcode .= !empty($_POST['shortcode-brand']) ? ' brand=' . intval($_POST['shortcode-brand']) : '';
		$shortcode .= !empty($_POST['shortcode-limit']) ? ' limit=' . intval($_POST['shortcode-limit']) : '';
		$shortcode .= !empty($_POST['shortcode-page']) ? ' page=' . intval($_POST['shortcode-page']) : '';
		$shortcode .= !empty($_POST['shortcode-speed']) ? ' speed=' . intval($_POST['shortcode-speed']) : '';
		$shortcode .= ']';

		return ['status' => 'success', 'result' => $shortcode];
	}
}
