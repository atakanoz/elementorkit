<?php

/**
 * Plugin Name: ElementorKit
 * Description: Custom Elementor addon.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-test-addon
 *
 * Elementor tested up to: 3.11.0
 * Elementor Pro tested up to: 3.11.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Global Definitions.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ELEMENTOR_ADDON', 'addon' );
define( 'ELEMENTOR_ADDON_NAME', 'Elementor Addon' );
define( 'ELEMENTOR_ADDON_VERSION', '1.0.0' );
define( 'ELEMENTOR_ADDON_FILE', __FILE__ );
define( 'ELEMENTOR_ADDON_PLUGIN_DIR', trailingslashit( dirname( ELEMENTOR_ADDON_FILE ) ) );
define( 'ELEMENTOR_ADDON_PLUGIN_URL', trailingslashit( plugin_dir_url( ELEMENTOR_ADDON_FILE ) ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in app/core/class-pluginkit-activator.php
 */
function activate_addong() {

	// Require the activator.
	require_once ELEMENTOR_ADDON_PLUGIN_DIR . 'includes/init/elementorkit-activator.php';

	// Init the activator.
	$activate = new ElementorKit\Activator();

	// Call the run.
	$activate->run();

}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in app/core/class-pluginkit-deactivator.php
 */
function deactivate_addon() {

	// Require the activator.
	require_once ELEMENTOR_ADDON_PLUGIN_DIR . 'includes/init/elementorkit-deactivator.php';

	// Init the activator.
	$deactivate = new ElementorKit\Deactivator();

	// Call the run.
	$deactivate->run();

}

register_activation_hook( __FILE__, 'activate_pluginkit' );
register_deactivation_hook( __FILE__, 'deactivate_pluginkit' );

/**
 * Initialize the addon.
 *
 * @return void
 */
function elementor_addon() {

	// Load plugin file.
	require_once __DIR__ . '/includes/elementorkit.php';

	// Run the plugin.
	\ElementorKit\Addons::instance();

}
add_action( 'plugins_loaded', 'elementor_addon' );