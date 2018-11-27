<?php

class QueryBuilder
{

    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetch($table, $class = null)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table}");
        $query->execute();
        if ($class) {
            return $query->fetchAll(PDO::FETCH_CLASS, $class);
        }
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}
