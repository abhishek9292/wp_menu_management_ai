<?php
 
require_once( WPMMAI_PLUGIN_DIR . 'mvc/helper/WPMMAI_helper.php' );
require_once( WPMMAI_PLUGIN_DIR . 'main/core/WPMMAI_Controller.php' );

foreach (glob(WPMMAI_PLUGIN_DIR . "mvc/controller/*.php") as $filename) {
    include $filename;
    $name = basename($filename);
    $name = str_replace(".php", "", $name);
    $cls = new $name(); 
}

//
//
//function getmnu() {
//    global $nam;
//    global $class;
//    $name = $nam;
//    $cls = $class;
//    if($cls && $name) { 
//        $lname = strtolower($name);
//        $uclname = ucfirst($lname);
//        $ar['title'] = (isset($_SESSION[$lname . '-page_title']) ? $_SESSION[$lname . '-page_title'] : $uclname);
//        $ar['pname'] = (isset($_SESSION[$lname . '-menu_title']) ? $_SESSION[$lname . '-menu_title'] : $uclname);
//        $ar['cap'] = (isset($_SESSION[$lname . '-mcap']) ? $_SESSION[$lname . '-mcap'] : 'manage_options');
//        $ar['lname'] = $lname;
//        add_menu_page($ar['title'], $ar['pname'], $ar['cap'], 'wpmmai_' . $ar['lname'] . '_index', call_user_func(array($cls, 'index')));
//    }
//    //add_menu_page($title, $pname, $cap, 'wpmmai_'.$lname.'_index', call_user_func(array($cls, 'index')) );
//}
