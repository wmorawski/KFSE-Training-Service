<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 28.03.2017
 * Time: 16:54
 */

function set_active(string $link){
    $CI =& get_instance();
    return $CI->router->method === $link ? 'active' : null;
}