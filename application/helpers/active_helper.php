<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 28.03.2017
 * Time: 16:54
 * @param string $link
 * @return null|string
 */

function set_active(string $link){
    $CI =& get_instance();
    return $CI->router->class === $link ? 'active' : null;
}