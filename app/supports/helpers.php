<?php

if (!function_exists('dump')) {
    function dump($var)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}
