<?php

class WPMMAI_Controller {

    protected $db = null;
    protected $data = [];

    public function __construct() {
        global $wpdb;
        $this->db = $wpdb;
        $this->init();
        //add_action('admin_menu', array($this, 'init_menu'));
    }

    public function init_menu() {
        add_menu_page("AI", "AI", "manage_options", 'wpmmai_ai', array($this, 'masterpage'));
    }

    public function createField($array, $table) {
        if (count($array) && $table) {
            $this->db->query("create table IF NOT EXISTS `$table` ("
                    . "`id` int(11) NOT NULL auto_increment, "
                    . "PRIMARY KEY  (`id`)"
                    . ")  ;");
            foreach ($array as $key => $value) {
                if (!$this->db->field_exists($key, $table)) {
                    $this->db->query("alter table $table add $key text null;");
                }
            }
        }
    }

    public function createFields($array, $table) {
        if (count($array) && $table) {
            $this->db->query("create table IF NOT EXISTS `$table` ("
                    . "`id` int(11) NOT NULL auto_increment, "
                    . "PRIMARY KEY  (`id`)"
                    . ")  ;");
            foreach ($array as $value) {
                if (!$this->db->field_exists($value, $table)) {
                    $this->db->query("alter table $table add $value text null;");
                }
            }
        }
    }

    protected function init() {
        $this->db->field_exists = function ($table_name, $column_name) {
            $column = $this->db->get_results($this->db->prepare("SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = %s AND TABLE_NAME = %s AND COLUMN_NAME = %s ",
                            DB_NAME, $table_name, $column_name
            ));

            if (!empty($column)) {
                return true;
            }

            return false;
        };
    }

    private function path() {
        return trailingslashit(dirname(__FILE__)); //Will remove trailing forward and backslashes if it exists already before adding a trailing forward slash. This prevents double slashing a string or path.
    }

    public function masterpage() {
        //echo "masterpage";
        load_view("__main", $this->data);
    }

}
