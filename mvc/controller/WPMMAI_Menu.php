<?php

if (defined('ABSPATH') && !class_exists('WPMMAI_Menu')) {

    class WPMMAI_Menu {

        public function __construct() {
            add_action('admin_menu', array($this, 'init_menu'));
        }

        public function init_menu() {
            add_menu_page("Menu setting", "Menu setting", "manage_options", 'wpmmai_menu', array($this, 'wpmmai_index'));
            add_action('admin_notices', 'general_admin_notice');
        }

        function general_admin_notice() {
            global $pagenow;
            if ($pagenow == 'plugins.php') {
                echo '<div class="notice notice-warning">
                    <h2><b>Note: </b>Please do not delete any plugins if you donot know. Every plugin features added and customized .</h2>
                </div>';
            }
        }

        public function wpmmai_index() {
//            global $menu;
//            global $submenu;
//            echo "<pre>";
//            //print_r($menu);
//            print_r($submenu);
//            $this->data['subview'] = "menu/index";
            load_view('menu/index',$this->data);
        }

    }

}