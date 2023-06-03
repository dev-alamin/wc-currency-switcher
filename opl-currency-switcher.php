<?php 
/**
 * Plugin Name: Onpoint Learning Helper
 * Plugin URI:  https://almn.me/onpoint-learning
 * Description: This plugin is a helper for onpoint learning.
 * Version:     1.0
 * Author:      Al Amin
 * Author URI:  https://almn.me
 * Text Domain: opl
 * Domain Path: /languages
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * Requires at least: 5.4
 * Requires PHP: 7.0
 * Requires Plugins: Required plugins
 *
 * @package     OPL
 * @author      Al Amin
 * @copyright   2023 awesomedigitalsolution
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 *
 * Prefix:      Opl
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

define( 'OPL_HELPER_VERSION', '1.0' );
define( 'OPL_HELPER_PLUGIN', __FILE__ );
define( 'OPL_HELPER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'OPL_HELPER_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

add_action( 'plugins_loaded', 'Opl_plugin_init' );
/**
 * Load localization files
 *
 * @return void
 */
function Opl_plugin_init() {
    load_plugin_textdomain( 'opl', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}


require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/admin/menu.php';
require_once __DIR__ . '/frontend/shortcode/price-shortcode.php';
require_once __DIR__ . '/frontend/enqueue/frontend.php';

use GeoIp2\Database\Reader;

// Check if WooCommerce is active
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    // Function to get visitor's country based on IP address
    function get_visitor_country() {
        // Get the visitor's IP address
        $ip_address = $_SERVER['REMOTE_ADDR'];

        // Create a GeoIP2 reader
        $reader = new GeoIp2\Database\Reader( __DIR__ . '/GeoLite2-Country/GeoLite2-Country.mmdb' ); // Replace with the actual path to the GeoIP2 database file

        try {
            // Perform a geolocation lookup
            $record = $reader->country($ip_address);

            // Extract the country code from the lookup result
            $country_code = $record->country->isoCode;

            return $country_code;
        } catch (GeoIp2\Exception\AddressNotFoundException $e) {
            // Handle the exception when IP address is not found in the database
            return 'US'; // Default country code
        }
    }

    // Hook into WooCommerce currency switcher
    add_filter('woocommerce_currency', 'change_woocommerce_currency_based_on_country', 10, 1);
    function change_woocommerce_currency_based_on_country($currency) {
        // Get visitor's country
        $country = get_visitor_country();

        // Set currency based on country
        switch ($country) {
            case 'AU':
                $currency = 'AUD';
                break;
            case 'GB':
                $currency = 'GBP';
                break;
            case 'BD':
                $currency = 'BDT';
                break;
            default:
                $currency = 'USD';
                break;
        }

        return $currency;
    }

    // Set currency based on visitor country
    function set_currency_based_on_country() {
        // Get visitor country
        $visitor_country = get_visitor_country();

        // Set the currency based on the visitor country
        if ($visitor_country === 'AU') {
            update_option('woocommerce_currency', 'AUD'); // Change to the desired currency code
        } elseif ($visitor_country === 'GB') {
            update_option('woocommerce_currency', 'GBP'); // Change to the desired currency code
        } elseif ($visitor_country === 'BD') {
            update_option('woocommerce_currency', 'BDT'); // Change to the desired currency code
        }else{
            update_option('woocommerce_currency', 'AUD'); // Change to the desired currency code
        }
    }

    // Hook into the 'init' action to set the currency
    add_action('woocommerce_loaded', 'set_currency_based_on_country');

    function modify_product_price_based_on_country( int $product_id ): void {
        // Get visitor's country
        $country = get_visitor_country();
    
        // Get the prices from the options table
        $australian_price = get_option('australian_price', 0);
        $australian_sale_price = get_option('australian_sale_price', 0);
        $british_price = get_option('british_price', 0);
        $british_sale_price = get_option('british_sale_price', 0);
        $bangladeshi_price = get_option('bangladeshi_price', 0);
        $bangladeshi_sale_price = get_option('bangladeshi_sale_price', 0);
        $default_price = get_option('default_price', 0);
        $default_sale_price = get_option('default_sale_price', 0);
    
        // Get the Vicarious Trauma prices from the options table
        $vicarious_australian_price = get_option('vicarious_trauma_australian_price', 0);
        $vicarious_australian_sale_price = get_option('vicarious_trauma_australian_sale_price', 0);
        $vicarious_british_price = get_option('vicarious_trauma_british_price', 0);
        $vicarious_british_sale_price = get_option('vicarious_trauma_british_sale_price', 0);
        $vicarious_bangladeshi_price = get_option('vicarious_trauma_bangladeshi_price', 0);
        $vicarious_bangladeshi_sale_price = get_option('vicarious_trauma_bangladeshi_sale_price', 0);
        $vicarious_default_price = get_option('vicarious_trauma_default_price', 0);
        $vicarious_default_sale_price = get_option('vicarious_trauma_default_sale_price', 0);

        // Get the Trauma-informed prices from the options table
        $trauma_informed_australian_price = get_option('trauma_informed_australian_price', 0);
        $trauma_informed_australian_sale_price = get_option('trauma_informed_australian_sale_price', 0);
        $trauma_informed_british_price = get_option('trauma_informed_british_price', 0);
        $trauma_informed_british_sale_price = get_option('trauma_informed_british_sale_price', 0);
        $trauma_informed_bangladeshi_price = get_option('trauma_informed_bangladeshi_price', 0);
        $trauma_informed_bangladeshi_sale_price = get_option('trauma_informed_bangladeshi_sale_price', 0);
        $trauma_informed_default_price = get_option('trauma_informed_default_price', 0);
        $trauma_informed_default_sale_price = get_option('trauma_informed_default_sale_price', 0);
    
        // Modify the product price based on country
        $pid = 1261;
        $apid = 1260;
        $tipid = 1259;
        switch ($country) {
            case 'AU':
                // Set the price for Australian Dollars (AUD)
                if ($product_id == $pid ) {
                    // Product 1
                    update_post_meta($product_id, '_regular_price', $vicarious_australian_price);
                    update_post_meta($product_id, '_price', $vicarious_australian_sale_price);
                    update_post_meta($product_id, '_sale_price', $vicarious_australian_sale_price);
                } elseif( $product_id == $apid ) {
                    update_post_meta($product_id, '_regular_price', $australian_price);
                    update_post_meta($product_id, '_price', $australian_sale_price);
                    update_post_meta($product_id, '_sale_price', $australian_sale_price);
                }elseif( $product_id == $tipid ) {
                    update_post_meta($product_id, '_regular_price', $trauma_informed_australian_price);
                    update_post_meta($product_id, '_price', $trauma_informed_australian_sale_price);
                    update_post_meta($product_id, '_sale_price', $trauma_informed_australian_sale_price);
                }
                break;
            case 'GB':
                // Set the price for British Pounds (GBP)
                if ($product_id == $pid ) {
                    // Product 1
                    update_post_meta($product_id, '_regular_price', $vicarious_british_price);
                    update_post_meta($product_id, '_price', $vicarious_british_sale_price);
                    update_post_meta($product_id, '_sale_price', $vicarious_british_sale_price);
                } elseif( $product_id == $apid ) {
                    update_post_meta($product_id, '_regular_price', $british_price);
                    update_post_meta($product_id, '_price', $british_sale_price);
                    update_post_meta($product_id, '_sale_price', $british_sale_price);
                }elseif( $product_id == $tipid ) {
                    update_post_meta($product_id, '_regular_price', $trauma_informed_british_price);
                    update_post_meta($product_id, '_price', $trauma_informed_british_sale_price);
                    update_post_meta($product_id, '_sale_price', $trauma_informed_british_sale_price);
                }
                break;
            case 'BD':
                // Set the price for Bangladeshi Taka (BDT)
                if ($product_id == $pid ) {
                    // Product 1
                    update_post_meta($product_id, '_regular_price', $vicarious_bangladeshi_price);
                    update_post_meta($product_id, '_price', $vicarious_bangladeshi_sale_price);
                    update_post_meta($product_id, '_sale_price', $vicarious_bangladeshi_sale_price);
                } elseif( $product_id == $apid ) {
                    update_post_meta($product_id, '_regular_price', $bangladeshi_price);
                    update_post_meta($product_id, '_price', $bangladeshi_sale_price);
                    update_post_meta($product_id, '_sale_price', $bangladeshi_sale_price);
                }elseif( $product_id == $tipid ) {
                    update_post_meta($product_id, '_regular_price', $trauma_informed_bangladeshi_price);
                    update_post_meta($product_id, '_price', $trauma_informed_bangladeshi_sale_price);
                    update_post_meta($product_id, '_sale_price', $trauma_informed_bangladeshi_sale_price);
                }
                break;
            default:
                // Set the default price
                if ($product_id == $pid ) {
                    // Product 1
                    update_post_meta($product_id, '_regular_price', $vicarious_default_price);
                    update_post_meta($product_id, '_price', $vicarious_default_sale_price);
                    update_post_meta($product_id, '_sale_price', $vicarious_default_sale_price);
                } elseif( $product_id == $apid ) {
                    update_post_meta($product_id, '_regular_price', $default_price);
                    update_post_meta($product_id, '_price', $default_sale_price);
                    update_post_meta($product_id, '_sale_price', $default_sale_price);
                } elseif( $product_id == $tipid ) {
                    update_post_meta($product_id, '_regular_price', $trauma_informed_default_price);
                    update_post_meta($product_id, '_price', $trauma_informed_default_sale_price);
                    update_post_meta($product_id, '_sale_price', $trauma_informed_default_sale_price);
                }
                error_log( 'Onpoint Learning Default case updated ' );
                break;
        }
    }
    
    // Modify prices for specific products
    function modify_specific_product_prices() {
        // Product 1
        modify_product_price_based_on_country(1260); // Replace 14 with the actual product ID
    
        // Product 2
        modify_product_price_based_on_country(1261); // Replace 190 with the actual product ID
    
        // Product 2
        modify_product_price_based_on_country(1259); // Replace 190 with the actual product ID
    
    }
    

    // Hook into an appropriate action to modify the product prices
    add_action('init', 'modify_specific_product_prices');

}


