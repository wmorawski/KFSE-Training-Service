<?php
function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}
function multi_in_array($value, $array)
{
    foreach ($array AS $item)
    {
        if (!is_array($item))
        {
            if ($item == $value)
            {
                return true;
            }
            continue;
        }

        if (in_array($value, $item))
        {
            return true;
        }
        else if (multi_in_array($value, $item))
        {
            return true;
        }
    }
    return false;
}

function is_in_array($array, $key, $key_value){
      $within_array = false;
      foreach( $array as $k=>$v ){
        if( is_array($v) ){
            $within_array = is_in_array($v, $key, $key_value);
            if( $within_array === true){
                break;
            }
        } else {
                if( $v == $key_value && $k == $key ){
                        $within_array = true;
                        break;
                }
        }
      }
      return $within_array;
}
