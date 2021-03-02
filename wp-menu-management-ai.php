<?php
/*
Plugin Name: Menu Management
Plugin URI: https://appsindia.co.in/
Description: Free Menu Management.
Author: Abhishek kumar
Author URI: https://appsindia.co.in/
Text Domain: wp-menu-management-ai
Domain Path: /languages/
Version: 1.0
*/

/*
Copyright 2020-2021  Abhishek kumar  (email: abhishek.abhishek92@yahoo.in)
*/

if ( ! function_exists( 'get_option' ) ) {
    header( 'HTTP/1.0 403 Forbidden' );
    die;  // Silence is golden, direct call is prohibited
}

if ( defined( 'WPMMAI_PLUGIN_URL' ) ) {
   wp_die( 'It seems that other version of wp-menu-management-ai is active. Please deactivate it before use this version' );
}

define( 'WPMMAI_VERSION', '1.0' );
define( 'WPMMAI_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WPMMAI_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'WPMMAI_PLUGIN_BASE_NAME', plugin_basename( __FILE__ ) );
define( 'WPMMAI_PLUGIN_FILE', basename( __FILE__ ) );
define( 'WPMMAI_PLUGIN_FULL_PATH', __FILE__ );
//require_once( URE_PLUGIN_DIR.'includes/classes/base-lib.php' );
//require_once( URE_PLUGIN_DIR.'includes/classes/lib.php' );
//
require_once( WPMMAI_PLUGIN_DIR .'includes/loader.php' );
