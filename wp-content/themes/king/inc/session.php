<?php 
//start session
add_action('init', 'StartSession', 1);
function StartSession() {
    if(!session_id()) {
        session_start();
    }
}

//flashdata
function flashdata($key=0) {
	
    if (!isset($_SESSION['flashdata'])) {
        return null;
    }
    $messages = $_SESSION['flashdata'];
    unset($_SESSION['flashdata']);

    

    return $messages[$key];
}

 function set_flashdata($message) {
    if (!isset($_SESSION['flashdata'])) {
        $_SESSION['flashdata'] = array();
    }
    $_SESSION['flashdata'] = $message;

}
 ?>