<?php
/*
Plugin Name: PSP Plugin Template
Plugin URI: https://github.org/Csharlie/wp-plugin-template
Description: A simple wordpress plugin template
Version: 1.0
Author: Peter Sardy
Author URI: petersardy@gmail.com
License: GPL-2.0
*/

if(!class_exists('PSP_Plugin_Template'))
{
	class PSP_Plugin_Template
	{
		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
			// Initialize Settings
			require_once(sprintf("%s/settings.php", dirname(__FILE__)));
			$PSP_Plugin_Template_Settings = new PSP_Plugin_Template_Settings();

			// Register custom post types
			require_once(sprintf("%s/lib/post_type_template.php", dirname(__FILE__)));
			$Post_Type_Template = new Post_Type_Template();

			// Register taxonomies
			require_once(sprintf("%s/lib/post_type_taxonomies.php", dirname(__FILE__)));

			// Register shortcodes
			require_once(sprintf("%s/lib/post_type_shortcode.php", dirname(__FILE__)));

			$plugin = plugin_basename(__FILE__);
			add_filter("plugin_action_links_$plugin", array( $this, 'plugin_settings_link' ));
		} // END public function __construct

		/**
		 * Activate the plugin
		 */
		public static function activate()
		{
			// Do nothing
		} // END public static function activate

		/**
		 * Deactivate the plugin
		 */
		public static function deactivate()
		{
			// Do nothing
		} // END public static function deactivate

		// Add the settings link to the plugins page
		function plugin_settings_link($links)
		{
			$settings_link = '<a href="options-general.php?page=psp_plugin_template">Settings</a>';
			array_unshift($links, $settings_link);
			return $links;
		}


	} // END class PSP_Plugin_Template
} // END if(!class_exists('PSP_Plugin_Template'))

if(class_exists('PSP_Plugin_Template'))
{
	// Installation and uninstallation hooks
	register_activation_hook(__FILE__, array('PSP_Plugin_Template', 'activate'));
	register_deactivation_hook(__FILE__, array('PSP_Plugin_Template', 'deactivate'));

	// instantiate the plugin class
	$psp_plugin_template = new PSP_Plugin_Template();

}

