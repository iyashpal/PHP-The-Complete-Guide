<?php

spl_autoload_register(
    function ($classname) {
        include __DIR__. "/inc/{$classname}.php";
    }
);

$config = include __DIR__."/inc/config.php";

$pdo = DB::make($config);

$query = new QueryBuilder($pdo);

$todos = $query->fetch('todos', 'Todo');
