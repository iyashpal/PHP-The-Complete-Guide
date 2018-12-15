<?php

class QueryBuilder
{
    protected $pdo;

    protected $where;

    protected $table;

    protected $select;

    protected $class;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    /**
     * Function to specify the columns for results
     *
     * @param array $args Column names
     *
     * @return mixed
     */
    public function select(...$args)
    {
        $this->select = join(', ', $args);
        return $this;
    }

    /**
     * Get all data from table.
     *
     * @return mixed
     */
    public function get()
    {
        $query = $this->pdo->prepare(
            "SELECT " . ($this->select ? $this->select : '*') . " FROM {$this->table} {$this->where}"
        );
        $query->execute();
        if (class_exists($this->class)) {
            return $query->fetchAll(
                PDO::FETCH_CLASS, $this->class
            );
        }
        return $query->fetchAll(
            PDO::FETCH_OBJ
        );

    }
    /**
     * Get all data from table.
     *
     * @return mixed
     */
    public function first()
    {
        $query = $this->pdo->prepare(
            "SELECT " . ($this->select ? $this->select : '*') . " FROM {$this->table} {$this->where}"
        );
        $query->execute();

        return $query->fetchObject(
            class_exists($this->class) ? $this->class : ''
        );

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
        $this->class = ucfirst(str_singular($table));
        return $this;
    }
}
