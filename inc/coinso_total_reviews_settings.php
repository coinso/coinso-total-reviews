<?php
/**
 * Created by PhpStorm.
 * User: ido
 * Date: 4/22/2018
 * Time: 09:32
 */

if (!defined('ABSPATH')) {
    exit;
}
// Create the Menu link

function ctr_options_menu_link(){
    add_menu_page( 'Google Reviews', 'Google Reviews', 'manage_options', 'ctr-options', 'ctr_options_content', 'dashicons-star-filled');
}

//Create Options page content
function ctr_options_content(){


    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
// init global variable for options

    global $ctr_options;

    ob_start();?>

    <div class="wrap">
        <h2><?php _e('Google Total Reviews', 'coinso_total_reviews') ;?></h2>
        <p>
            <?php _e('Settings For the Google Reviews Plugin', 'coinso_total_reviews') ;?>
        </p>
        <form action="options.php" method="post">

            <?php settings_fields('ctr_settings_group') ;?>
            <table class="form-table">
                <tbody>

                <th>

                    <?php echo _e('Google Reviews Settings', 'coinso_total_reviews');?>
                </th>
                <tr>
                    <th scope="row">
                        <label for="ctr_settings[business_name]">
                            <?php _e('Add Business Name', 'coinso_total_reviews') ;?>
                        </label>
                    </th>
                    <td>
                        <input type="text" name="ctr_settings[business_name]" value="<?php echo $ctr_options['business_name'] ;?>" id="ctr_settings[business_name]" class="regular-text" placeholder="Best Locksmith Ever"/>
                        <p class="description">
                            <?php _e('Add Business Name', 'coinso_total_reviews');?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="ctr_settings[service_type]">
                            <?php _e('Add Type of service', 'coinso_total_reviews') ;?>
                        </label>
                    </th>
                    <td>
                        <input type="text" name="ctr_settings[service_type]" value="<?php echo $ctr_options['service_type'] ;?>" id="ctr_settings[service_type]" class="regular-text" placeholder="Towing & Roadside Assistance"/>
                        <p class="description">
                            <?php _e('Add the type of the main service (Locksmith / Towing & Roadside Assistance)', 'coinso_total_reviews');?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="ctr_settings[service_provider]">
                            <?php _e('Add type of service provider', 'coinso_total_reviews') ;?>
                        </label>
                    </th>
                    <td>
                        <input type="text" name="ctr_settings[service_provider]" value="<?php echo $ctr_options['service_provider'] ;?>" id="ctr_settings[service_provider]" class="regular-text" placeholder="AutomotiveBusiness"/>
                        <p class="description">
                            <?php _e('Add Type of service provider (Locksmith / LocalBusiness / AutomotiveBusiness', 'coinso_total_reviews');?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="ctr_settings[total_reviews]">
                            <?php _e('Add Total num of reviews', 'coinso_total_reviews') ;?>
                        </label>
                    </th>
                    <td>
                        <input type="text" name="ctr_settings[total_reviews]" value="<?php echo $ctr_options['total_reviews'] ;?>" id="ctr_settings[total_reviews]" class="regular-text" placeholder="123"/>
                        <p class="description">
                            <?php _e('Add Total num of reviews', 'coinso_total_reviews');?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="ctr_settings[total_score]">
                            <?php _e('Add Total Reviews Stars', 'coinso_total_reviews') ;?>
                        </label>
                    </th>
                    <td>
                        <input type="text" name="ctr_settings[total_score]" value="<?php echo (float) $ctr_options['total_score'] ;?>" id="ctr_settings[total_score]" class="regular-text" placeholder="4.5"/>
                        <p class="description">
                            <?php _e('Add Total Reviews Stars', 'coinso_total_reviews');?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="ctr_settings[reviews_url]">
                            <?php _e('Add Google review URL', 'coinso_total_reviews') ;?>
                        </label>
                    </th>
                    <td>
                        <span>
                            <input type="text" name="ctr_settings[reviews_url]" value="<?php echo $ctr_options['reviews_url'] ;?>" id="ctr_settings[reviews_url]" class="regular-text" placeholder="Add URL here"/>"
                        </span>
                        <p class="description">
                            <?php _e('Add Google review URL', 'coinso_total_reviews');?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="ctr_settings[cta]">
                            <?php _e('Add CTA to review link', 'coinso_total_reviews') ;?>
                        </label>
                    </th>
                    <td>
                        <input type="text" name="ctr_settings[cta]" value="<?php echo $ctr_options['cta'] ;?>" id="ctr_settings[cta]" class="regular-text" placeholder="Write a review"/>
                        <p class="description">
                            <?php _e('Add CTA to review link (Review Us)', 'coinso_total_reviews');?>
                        </p>
                    </td>
                </tr>
                </tbody>

            </table>
            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes', 'coinso_total_reviews') ;?>">
            </p>
        </form>
    </div>

    <?php

    echo ob_get_clean();

}
if ( is_admin() ){

    add_action('admin_menu','ctr_options_menu_link');
}

