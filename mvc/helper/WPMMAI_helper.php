<?php

function WPMMAI_script($str = "") {
    return "<script>$str</script>";
}

function set_GlobLLANG($key, $str) {
    if ($key && $str) { 
        $lname =strtolower($key); 
        $_SESSION[$lname. '-page_title'] = $str;
        $_SESSION[$lname. '-menu_title'] = $str;
    }
}
 
function load_view($filename, $data = null, $return = false) {
    if ($data && is_array($data)) {
        extract($data);
    }
    $file = 'mvc/view/' . $filename . '.php';
    if($return){
       return require_once( WPMMAI_PLUGIN_DIR . $file);
    }else{
        require_once( WPMMAI_PLUGIN_DIR . $file);
        
    }
}
