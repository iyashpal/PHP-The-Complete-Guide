<?php

class QueryBuilder
{
    protected $pdo;

    protected $where;

    protected $table;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Get all data from table.
     *
     * @return mixed
     */
    public function select($class = null)
    {
    $query = $this->pdo->prepare("SELECT * FROM {$this->table} {$this->where}");
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
    public function create(array $data)
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
        $query = $this->pdo->prepare("INSERT INTO {$this->table} ({$columns}) VALUES ($values)");
        return $query->execute();
    }

    /**
     *  Set up where clouses
     *
     * @param mixed $key   Column name of whereclouse
     * @param mixed $value Value of whereclouse
     *
     * @return QueryBuilder
     */
    public function where($key, $value = null)
    {
        $this->where .= "WHERE 1 ";
        if (is_array($key)) {
            foreach ($key as $column => $value) {
                $this->where .= " AND {$column}=\"{$value}\"";
            }
            return $this;
        }

        $this->where .= " AND {$key}=\"{$value}\"";
        return $this;
    }

    /**
     * Setup query builder table
     *
     * @param string $table Table name of querybuilder
     *
     * @return object
     */
    public function table($table)
    {
        $this->table = $table;
        return $this;
    }
}
