<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Fr_Custom_Payment_Gateway_Icon_For_WooCommerce
 *
 * @wordpress-plugin
 * Plugin Name:       Fr Custom Payment Gateway Icon for WooCommerce
 * Plugin URI:		  https://wordpress.org/plugins/fr-custom-payment-gateway-icon-for-woocommerce/
 * Description:       Add or change payment gateway icons that appear on the WooCommerce checkout page.
 * Version:           1.0.0
 * Author:            Fahri Rusliyadi
 * Author URI:        https://profiles.wordpress.org/fahrirusliyadi
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       fr-custom-payment-gateway-icon-for-woocommerce
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-fr-custom-payment-gateway-icon-for-woocommerce.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_fr_custom_payment_gateway_icon_for_woocommerce() {

	$plugin = new Fr_Custom_Payment_Gateway_Icon_For_WooCommerce();
	$plugin->run();

}
run_fr_custom_payment_gateway_icon_for_woocommerce();
