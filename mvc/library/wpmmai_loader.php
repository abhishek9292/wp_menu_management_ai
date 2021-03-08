<?php
 
require_once( WPMMAI_PLUGIN_DIR . 'mvc/helper/WPMMAI_helper.php' ); 

foreach (glob(WPMMAI_PLUGIN_DIR . "mvc/controller/*.php") as $filename) {
    include $filename;
    $name = basename($filename);
    $name = str_replace(".php", "", $name);
    $cls = new $name(); 
}
