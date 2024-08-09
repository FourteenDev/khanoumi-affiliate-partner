<?php

/**
 * Plugin Name:     Khanoumi Affiliate Partner Plugin
 * Plugin URI:      https://Khanoumi.com/
 * Description:     Fetch Khanoumi products and display them in your WordPress website.
 * Version:         1.1.0
 * Author:          Fourteen Development
 * Author URI:      https://Fourteen.dev/
 * Text Domain:     khanoumi-affiliate-partner
 * Domain Path:     /languages
 */

use KhanoumiAffiliatePartner\Core;

if (!defined('ABSPATH')) return;

define('KAPP_VERSION', '1.1.0');
define('KAPP_FILE', __FILE__);
define('KAPP_URL', plugin_dir_url(KAPP_FILE));
define('KAPP_DIR', plugin_dir_path(KAPP_FILE));
define('KAPP_BASENAME', plugin_basename(KAPP_FILE));
define('KAPP_SETTINGS_SLUG', 'kapp');
define('KAPP_OPTIONS_KEY_DB_VERSION', 'kapp_db_version');

require_once 'vendor/autoload.php';
require_once 'functions.php';

function KAPP()
{
	return Core::getInstance();
}
KAPP();
