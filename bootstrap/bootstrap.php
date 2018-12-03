<?php

spl_autoload_register(
    function ($classfile) {
        include __DIR__."/../app/core/{$classfile}.php";
    }
);

// Load all helpers
require_once __DIR__.'/../app/supports/helpers.php';


$config = include __DIR__ . '/../config/config.php';

return  new Application($config);
