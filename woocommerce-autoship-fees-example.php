<?php
/*
Plugin Name: WC Auto-Ship Fees Example
Plugin URI: http://wooautoship.com
Description: Add custom fees to autoship orders
Version: 1.0
Author: Patterns in the Cloud
Author URI: http://patternsinthecloud.com
License: Single-site
*/

define( 'WC_AUTOSHIP_FEES_EXAMPLE', '1.0.0' );

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'woocommerce-autoship/woocommerce-autoship.php' ) ) {
	
	function wc_autoship_fees_example_install() {
	}
	register_activation_hook( __FILE__, 'wc_autoship_fees_example_install' );
	
	function wc_autoship_fees_example_deactivate() {
	
	}
	register_deactivation_hook( __FILE__, 'wc_autoship_fees_example_deactivate' );
	
	function wc_autoship_fees_example_uninstall() {

	}
	register_uninstall_hook( __FILE__, 'wc_autoship_fees_example_uninstall' );
	
}
