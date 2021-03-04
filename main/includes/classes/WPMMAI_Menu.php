<?php

class WPMMAI_Menu {

    protected $db = null;
    protected $data = [];

    public function __construct() {
        global $wpdb;
        $this->db =$wpdb;
        register_activation_hook(__FILE__, array($this, 'install'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));
        add_action('admin_menu', array($this, 'init_menu'));
    }

    public function install() {
        $tablename = "menu";
        $main_sql_create = "create table IF NOT EXISTS `$tablename` ("
                . "`id` int(11) NOT NULL auto_increment, "
                . "`menuName` text null, "
                . "`menu_order` int(11) null, "
                . "`url` text null, "
                . "`status` int(1) null, "
                . "PRIMARY KEY  (`id`)"
                . ")  ;";
        maybe_create_table($tablename, $main_sql_create);
    }

    public function deactivate() {
        global $wpdb;
        $tablename = "menu";
        $wpdb->query("DROP TABLE IF EXISTS $tablename");
    }

    public function init_menu() {
        add_menu_page(
                'Menu management', // $page_title
                'Menu management', // $menu_title
                'manage_options', // $capability
                'wpmmai-menu-index', // $menu_slug
                array($this, 'wpmmai_menu_index')
        );
    }

    public function wpmmai_menu_index() {
        global $menu;
        global $submenu;
        $this->data["gmenus"]=$menu;
        $this->data["gsubmenus"]=$submenu;
        WPMMAI_view("menu/index", $this->data); 
    }

}
