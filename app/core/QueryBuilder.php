<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Get all data from table.
     *
     * @return mixed
     */
    public function selectAll($table, $class = null)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table}");
        $query->execute();
        if ($class) {
            return $query->fetchAll(PDO::FETCH_CLASS, 'Task');
        } else {
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
    }

    /**
     * Insert all data into table
     *
     * @return boolean
     */
    public function create($table, array $data)
    {
        $columns = implode(', ', array_keys($data));
        $values = implode(
            ', ',
            array_map(
                function ($value) {
                    return "\"{$value}\"";
                },
                $data
            )
        );
        $query = $this->pdo->prepare("INSERT INTO {$table} ({$columns}) VALUES ($values)");
        return $query->execute();
    }
}
