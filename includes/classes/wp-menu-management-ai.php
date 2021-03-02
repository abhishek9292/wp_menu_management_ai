<?php

/*
 * Main class of Menu Management WordPress plugin
 * Author: Abhishek kumar
 * Author email: foreach92@gmail.com
 * Author URI: http://appsindia.co.in
 * License: GPL v2+
 */
class Wp_menu_management_ai {

    protected static $instance = null;

    public static function get_instance() {
        if (self::$instance === null) {
            self::$instance = new Wp_menu_management_ai();
        }

        return self::$instance;
    }

    // end of get_instance()

    /**
     * Prevent cloning of a *Singleton* instance 
     *
     * @return void
     */
    public function __clone() {
        throw new \Exception('Do not clone a singleton instance.');
    }

    // end of __clone()

    /**
     * Prevent unserializing of a *Singleton* instance.
     *
     * @return void
     */
    public function __wakeup() {
        throw new \Exception('Do not unserialize a singleton instance.');
    }

    // end of __wakeup()

    /**
     * class constructor
     */
    protected function __construct() {
        $this->set_hooks();
    }

    // end of __construct()


    private function set_hooks() {
        if (!is_admin()) {
            return;
        }
        // add own submenu 
        add_action('admin_menu', array($this, 'plugin_menu'));
        add_action('admin_init', array($this, 'plugin_init'), 1);
    }

    public function load_users_page() {
        add_action('admin_head', array($this, 'add_css_to_users_page'));
        add_action('admin_footer', array($this, 'add_js_to_users_page'));
    }

    public function plugin_menu() {
        //$translated_title = esc_html__('User Role Editor', 'user-role-editor');
        add_menu_page(
                'Menu management', //$page_title
                'Menu management', //$menu_title
                'manage_options', //$capability
                'wp-menu-management-ai', //$menu_slug
                'index_menu'     //$function
        );
    }

    /**
     * Plugin initialization
     * 
     */
    public function plugin_init() {
        add_action('admin_menu', 'mmts_plugin_exam_upload');
    }

    // end of plugin_init()

    public function add_css_to_users_page() {
//        wp_enqueue_style('wp-jquery-ui-dialog');
//        wp_enqueue_style('wpmmai-admin-css', WPMMAI_PLUGIN_URL . 'css/wpmmai-admin.css', array(), false, 'screen');
    }

    public function add_js_to_users_page() {

//        wp_enqueue_script('jquery-ui-dialog', '', array('jquery-ui-core', 'jquery-ui-button', 'jquery'));
//        wp_register_script('wpmmai-users', plugins_url('/js/users.js', WPMMAI_PLUGIN_FULL_PATH), array(), WPMMAI_VERSION);
//        wp_enqueue_script('wpmmai-users');
//        wp_localize_script('wpmmai-users', 'wpmmai_users_data', array(
//            'wp_nonce' => wp_create_nonce('user-role-editor'),
//            'move_from_no_role_title' => esc_html__('Change role for users without role', 'user-role-editor'),
//            'to' => esc_html__('To:', 'user-role-editor'),
//            'no_rights_caption' => esc_html__('No rights', 'user-role-editor'),
//            'provide_new_role_caption' => esc_html__('Provide new role', 'user-role-editor')
//        ));
    }

    public function index_menu() {
        if (!current_user_can('wpmmai_edit_menu')) {
            wp_die('Insufficient permissions to work with menu');
        }
        $editor = WPMMAI_Editor::get_instance();
        $editor->show();
    }
    // end of edit_roles()WPMMAI
}
