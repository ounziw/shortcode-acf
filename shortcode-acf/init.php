<?php
/*
Plugin Name: shortcode for Advanced Custom Fields
Plugin URI: 
Description: When you enter a shortcode, it will be executed and outputted, by using the_field('FIELD_NAME_HERE') in your theme.
Version: 1.0
Author: Fumito MIZUNO
Author URI: http://wp.php-web.net/
License: GPL
*/

function shortcode_field_init(){
load_plugin_textdomain('shortcode-acf', false, dirname(plugin_basename(__FILE__)).'/languages/' );
}
add_action('plugins_loaded', 'shortcode_field_init');

if (function_exists('register_field')){
register_field('ShortCode_field', WP_PLUGIN_DIR . '/shortcode-acf/shortcode_field.php');
}	
