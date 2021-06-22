<?php

/**
 * WP Engine Template Finder
 *
 * WordPress Plugin
 *
 * @link              https://www.creekdigital.co
 * @since             1.0.0
 * @package           WPEngineTemplateFinder
 *
 * @wordpress-plugin
 * Plugin Name:       WP Engine Template Finder
 * Plugin URI:        https://wpengine.com
 * Description:       WP Engine Template Finder for Marketing Team.
 * Version:           1.0.0
 * Author:            Rudy Macias
 * Author URI:        https://www.creekdigital.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpengine-templatefinder
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WPENGINE_TEMPLATEFINDER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wpengine-templatefinder-activator.php
 */
function activate_wpengine_templatefinder() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpengine-templatefinder-activator.php';
	WPEngineTemplateFinder_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wpengine-templatefinder-deactivator.php
 */
function deactivate_wpengine_templatefinder() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpengine-templatefinder-deactivator.php';
	WPEngineTemplateFinder_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wpengine_templatefinder' );
register_deactivation_hook( __FILE__, 'deactivate_wpengine_templatefinder' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wpengine-templatefinder.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wpengine_templatefinder() {

	$plugin = new WPEngineTemplateFinder();
	$plugin->run();

}
run_wpengine_templatefinder();
