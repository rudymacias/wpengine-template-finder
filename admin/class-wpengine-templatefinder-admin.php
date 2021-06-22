<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.creekdigital.co
 * @since      1.0.0
 *
 * @package    WPEngineTemplateFinder
 * @subpackage WPEngineTemplateFinder/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    WPEngineTemplateFinder
 * @subpackage WPEngineTemplateFinder/admin
 * @author     Rudy Macias <rudymacias@me.com>
 */
class WPEngineTemplateFinder_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Display Page Templates
	 *
	 * @since    1.0.0
	 */
	public static function display_page_templates( $columns ) {
		$columns['template'] = __( 'Template' );
		return $columns;
	}

	/**
	 * Template Column
	 *
	 * @since    1.0.0
	 */
	public static function template_column( $column, $post_id ) {
		if ( $column === 'template' ) {
			$current_template = get_post_meta( $post_id, '_wp_page_template', true );
			$templates = wp_get_theme()->get_page_templates();
			if ( !empty($templates[$current_template]) ) {
				echo $templates[$current_template];
			} else {
				echo "Default";
			}
		}
	}

	/**
	 * Filter Pages by Template
	 *
	 * @since    1.0.0
	 */
	public static function filter_pages_by_template( $column, $post_id ) {
		$type = 'post';
		if ( isset($_GET['post_type']) ) {
			$type = $_GET['post_type'];
		}
		if ( $type == 'page' ) {
			$templates = wp_get_theme()->get_page_templates();
			?>

			<select name="template_name">
			<option value=""><?php echo __('All Templates'); ?></option>
			<?php
				$current_v = isset($_GET['template_name'])? $_GET['template_name']:'';
				foreach ($templates as $value => $label) {
					printf(
							'<option value="%s"%s>%s</option>',
							$value,
							$value == $current_v? ' selected="selected"':'',
							$label
						);
					}
			?>
			</select>

			<?php
		}
	}

	/**
	 * Page Filter
	 *
	 * @since    1.0.0
	 */
	public static function page_filter( $query ) {
		global $pagenow;
		$type = 'page';
		if ( isset($_GET['post_type']) ) {
			$type = $_GET['post_type'];
		}
		if ( $type == 'page' && is_admin() && $pagenow=='edit.php' && isset($_GET['template_name']) && $_GET['template_name'] != '') {
			$query->query_vars['meta_key'] = '_wp_page_template';
			$query->query_vars['meta_value'] = $_GET['template_name'];
		}
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wpetemplatefinder_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpetemplatefinder_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpengine-templatefinder-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wpetemplatefinder_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpetemplatefinder_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpengine-templatefinder-admin.js', array( 'jquery' ), $this->version, false );

	}

}
