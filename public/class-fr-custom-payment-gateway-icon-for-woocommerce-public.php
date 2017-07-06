<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Fr_Custom_Payment_Gateway_Icon_For_WooCommerce
 * @subpackage Fr_Custom_Payment_Gateway_Icon_For_WooCommerce/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Fr_Custom_Payment_Gateway_Icon_For_WooCommerce
 * @subpackage Fr_Custom_Payment_Gateway_Icon_For_WooCommerce/public
 * @author     Fahri Rusliyadi <fahri.rusliyadi@gmail.com>
 */
class Fr_Custom_Payment_Gateway_Icon_For_WooCommerce_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Fr_Custom_Payment_Gateway_Icon_For_WooCommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fr_Custom_Payment_Gateway_Icon_For_WooCommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/fr-custom-payment-gateway-icon-for-woocommerce-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Fr_Custom_Payment_Gateway_Icon_For_WooCommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fr_Custom_Payment_Gateway_Icon_For_WooCommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/fr-custom-payment-gateway-icon-for-woocommerce-public.js', array( 'jquery' ), $this->version, false );

	}
        
        /**
         * Change the icon.
         * 
         * Hooked on `woocommerce_gateway_icon` filter.
         * 
         * @since 1.0.0
         * 
         * @param string $icon  Payment gateway icon image.
         * @param string $id    Payment gateway ID.
         * @return string
         */
        public function modify_icon($icon = '', $id = '') {
            if (!$id) {
                return $icon;
            }
            
            $payment_gateways = WC()->payment_gateways()->payment_gateways();
            
            if (!isset($payment_gateways[$id])) {
                return $icon;
            }
            
            /* @var $payment_gateway WC_Payment_Gateway */
            $payment_gateway    = $payment_gateways[$id]; 
            $custom_icon        = $payment_gateway->get_option('fcpgifw_icon');
            
            if (!$custom_icon) {
                return $icon;
            }
            
            return '<img src="' . WC_HTTPS::force_https_url(esc_url($custom_icon)) . '" alt="' . esc_attr( $payment_gateway->get_title() ) . '" />';
        }

}
