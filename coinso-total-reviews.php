<?php

/*
Plugin Name: Coinso Total Reviews
Plugin URI: http://
Description: Show Total Reviews on your website
Author: Ido @ Coinso.com
Author URI: https://coinso.com
Version: 1.0
Text Domain: coinso_toatal_reviews
Version: 1.0
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: https://github.com/barbareshet/plugin-path
*/

if (!defined('ABSPATH')) {
    exit;
}

//Global options var

$ctr_options = get_option('ctr_settings');


//Load Content


//Load Settings only if on the admin side
if (is_admin()){
    require_once ( plugin_dir_path(__FILE__) . '/inc/coinso_total_reviews_settings.php' );

}

//register the settings

function ctr_register_settings(){

    register_setting('ctr_settings_group', 'ctr_settings');

}
if ( is_admin() ){

    add_action('admin_init', 'ctr_register_settings');
}

//Register the shortcode
add_action('init', 'coinso_register_reviews_shortcode');

//Schema Customizer
function coinso_register_reviews_shortcode( ){

    add_shortcode('reviews','coinso_reviews_content' );
}

function coinso_reviews_content($args, $content = null){
    global $reviews_atts;
    $reviews_atts = shortcode_atts( array(
        'total_reviews'     =>  '',
        'total_score'       =>  '',
        'reviews_url'       =>  'reviews_url',
    ), $args);
    ob_start();
    require_once ( plugin_dir_path(__FILE__) . '/inc/coinso_total_reviews_content.php' );
    return ob_get_clean();
}