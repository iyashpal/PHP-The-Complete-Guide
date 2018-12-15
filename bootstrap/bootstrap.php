<?php

spl_autoload_register(
    function ($classfile) {
        $coreClass = __DIR__."/../app/core/{$classfile}.php";
        $modelClass = __DIR__."/../app/models/{$classfile}.php";
        if (file_exists($coreClass)) {
            include $coreClass;
        }

        if (file_exists($modelClass)) {
            include $modelClass;
        }
    }
);

session_start();

// Load all helpers
require_once __DIR__.'/../app/supports/helpers.php';


$config = include __DIR__ . '/../config/config.php';

return  new Application($config);
