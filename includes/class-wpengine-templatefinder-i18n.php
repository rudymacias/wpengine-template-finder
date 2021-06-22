<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.creekdigital.co
 * @since      1.0.0
 *
 * @package    WPEngineTemplateFinder
 * @subpackage WPEngineTemplateFinder/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    WPEngineTemplateFinder
 * @subpackage WPEngineTemplateFinder/includes
 * @author     Rudy Macias <rudymacias@me.com>
 */
class WPEngineTemplateFinder_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wpengine-templatefinder',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
