<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('active_link'))
{
    function activate_button($controller)
    {
        //getting CI class instance
    $CI = get_instance();

    //take instance class
    $class = $CI->router->fetch_class();
    return ($class == $controller) ? 'active' : '';
    }
}