<?php
require 'Task.php';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=test_php_tutorials', 'root', '');
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

$query = $pdo->prepare('SELECT * FROM todos');
$query->execute();
$tasks = $query->fetchAll(PDO::FETCH_CLASS, 'Task');




require 'index.view.php';
