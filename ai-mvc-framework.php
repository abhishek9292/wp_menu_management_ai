<?php

/*
  Plugin Name: AI MVC FRAMEWORK
  Plugin URI: https://appsindia.co.in/
  Description: Apps indian framework for wordpress. Licence GPL
  Author: Abhishek kumar
  Author URI: https://appsindia.co.in/
  Text Domain: ai-mvc-framework
  Domain Path: /mvc/languages/
  Version: 1.0
 */

/*
  Copyright 2020-2021  Abhishek kumar  (email: abhishek.abhishek92@yahoo.in) wpmmai
 */
if (!defined('ABSPATH')) {
    exit();
}
define('WPMMAI_VERSION', '1.0');
define('WPMMAI_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('WPMMAI_PLUGIN_BASE_NAME', plugin_basename(__FILE__));
define('WPMMAI_PLUGIN_FILE', basename(__FILE__));
define('WPMMAI_PLUGIN_FULL_PATH', __FILE__); 
require_once( WPMMAI_PLUGIN_DIR . 'mvc/library/wpmmai_loader.php' ); 
