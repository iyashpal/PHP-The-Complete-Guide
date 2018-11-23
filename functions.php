<?php

function connectToDb()
{
    try {
        return new PDO('mysql:host=localhost;dbname=test_php_tutorials', 'root', '');
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}

function fetchAllTasks($pdo)
{
    $query = $pdo->prepare('SELECT * FROM todos');
    $query->execute();
    return $query->fetchAll(PDO::FETCH_CLASS, 'Task');
}
