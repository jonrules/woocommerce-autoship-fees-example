<?php
/*
Plugin Name: WC Auto-Ship Fees Example
Plugin URI: http://wooautoship.com
Description: Example plugin showing how to add custom fees to autoship orders
Version: 1.0
Author: Patterns in the Cloud
Author URI: http://patternsinthecloud.com
License: Single-site
*/

define( 'WC_Autoship_Fees_Example_Version', '1.0.0' );

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
	
	function wc_autoship_fees_example_add_fees( $fees, $schedule_id ) {
		// Get the autoship schedule
		$schedule = new WC_Autoship_Schedule( $schedule_id );
		
		// Add a fee for each autoship schedule item
		$items = $schedule->get_items();
		foreach ( $items as $i => $item ) {
			// Get the WooCommerce product
			$product = $item->get_product();
			if ( ! empty( $product ) ) {
				// Create a fee for the product
				$fee = new stdClass();
				$fee->id = "wc_autoship_example_fee_{$i}";
				$fee->name = $product->get_title() . ' Fee';
				$fee->amount = 5.99;
				$fee->tax_class = '';
				$fee->taxable = false;
				$fee->tax = 0;
				$fee->tax_data = array();
				// Append the fee
				$fees[] = $fee;
			}
		}
		
		// Return fees
		return $fees;
	}
	add_filter( 'wc_autoship_schedule_fees', 'wc_autoship_fees_example_add_fees', 10, 3 );
}
