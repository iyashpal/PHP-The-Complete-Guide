<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=test_php_tutorials', 'root', '');
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

require 'index.view.php';
