<?php

spl_autoload_register(
    function ($classfile) {
        include __DIR__."/../app/core/{$classfile}.php";
    }
);

$config = include __DIR__ . '/../config/config.php';

return  new Application($config);

// $config = include 'config.php';

// return new QueryBuilder(
//     Connection::make($config['database'])
// );
