<?php

class Application {

    protected $config = array();

    protected $basePath;

    protected $appUrl;

    protected $queryBuilder;

    public function __construct($config)
    {
        $this->appUrl = $config['app']['url'];
        $this->basePath = $config['app']['basePath'];
        $this->queryBuilder($config['database']);
    }

    public function getUrl($abs_path = null)
    {
        if ($abs_path) {
            return rtrim($this->appUrl, '/') .'/'. ltrim($abs_path, '/');
        }
        return $this->appUrl;
    }

    public function getBasePath($abs_path = null)
    {
        if ($abs_path) {
            return rtrim($this->basePath, '/') .'/'. ltrim($abs_path, '/');
        }
        return $this->basePath;
    }

    public function loadApplication()
    {
        $DB = $this->queryBuilder;
        $app = $this;
        require_once $this->getBasePath('resources/views/layouts/page.php');
    }

    public function queryBuilder($database)
    {
        $this->queryBuilder = new QueryBuilder(
            Connection::make($database)
        );
    }




}
