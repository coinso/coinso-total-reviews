<?php

/**
 * Plugin name: Ido Social Links Plugin
 * Description: Social links Plugin
 * Version: 1.0
 * Author: Ido Barnea
 * Author URI: http://idowebservices.com
 * Plugin Site: idowebservices.com
 * 
 **/

//Exit if accessed directly
if (!defined('ABSPATH')){
    exit;
}

//Add Plugin's Scripts
function coinso_total_reviews_add_scripts(){
    //Enqueue Styles
    wp_enqueue_style('coinso_total_reviews-main-style', plugins_url() . '/coinso-total-reviews/assets/css/coinso_total_reviews-styles.css');
}
add_action('wp_enqueue_scripts','coinso_total_reviews_add_scripts' );