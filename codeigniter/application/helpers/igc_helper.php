<?php
//function current_admin_id()
//{
//$CI =& get_instance();
//return (int)$CI->session->userdata('admin_id');
//}
//
//function is_already_logged_in()
//{
//if ( ! current_admin_id())
//{
//redirect('login');
//}
//}
//
//function is_logged_in()
//{
//if (current_admin_id())
//{
//redirect('dashboard');
//}
//}

// helper to get ip

function get_ip()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    return $ip;
}


function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
function clean_spec($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('[^A-Za-z0-9\-]', '', $string); // Removes special chars.
}

function date_converter($date)
{
    $result = date("F j, Y, g:i a", strtotime($date));
    return $result;
}

function date_convert($date)
{
    $result = date("F j, Y", strtotime($date));
    return $result;
}



?>