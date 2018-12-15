<?php

if (!function_exists('dump')) {
    function dump($var)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}

if (!function_exists('str_singular')) {
    function str_singular($string)
    {
        return HumanLanguage::singularize($string);
    }
}

if (!function_exists('str_plural')) {
    function str_plural($string)
    {
        return HumanLanguage::pluralize($string);
    }
}

if (!function_exists('auth')) {
    function auth()
    {
        return @$_SESSION['auth'];
    }
}
