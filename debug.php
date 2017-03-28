<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/28/2017
 * Time: 11:03 AM
 */
class debug
{

    public static function trace($arr)
    {
        echo "<pre style='background-color: #ffff82;'>";
        print_r($arr);
        echo "</pre>";
    }

}