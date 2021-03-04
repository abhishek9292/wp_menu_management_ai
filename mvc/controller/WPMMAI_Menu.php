<?php
 
class WPMMAI_Menu extends WPMMAI_Controller {

    public function __construct() {
        parent::__construct();
        //add_action('admin_menu', array($this, 'index'));
    }
    
    public function init_menu() {
        //add_submenu_page("wpmmai_ai","menu", "menu", "manage_options", 'wpmmai_menu', array($this, 'index'));
    }
    
    public function index() {
        $this->data['subview']="menu/index";
    }
     
}