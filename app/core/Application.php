<?php

class Application {

    protected $config = array();

    protected $basePath;

    protected $appUrl;

    protected $queryBuilder;

    protected $controllerDir;

    protected $viewsDir;

    public function __construct($config)
    {
        $this->appUrl = $config['app']['url'];
        $this->basePath = $config['app']['basePath'];
        $this->controllerDir = $this->getBasePath('app/controllers/');
        $this->viewsDir = $this->getBasePath('resources/views/');
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

    /**
     * get the directory path of controller
     *
     * @return string
     */
    public function getControllerDir()
    {
        return $this->controllerDir;
    }

    /**
     * get the directory of views
     *
     * @return string
     */
    public function getViewsDir()
    {
        return $this->viewsDir;
    }

    public function loadApplication()
    {
        $DB = $this->queryBuilder;
        $app = $this;
        include_once $this->getBasePath('resources/views/layouts/page.php');
    }

    protected function queryBuilder($database)
    {
        $this->queryBuilder = new QueryBuilder(
            Connection::make($database)
        );
    }

    public function parseControllerName($controller_name)
    {
        if (strpos($controller_name, '-')) {
            $nameToArray = explode('-', $controller_name);
            $controllerToArray = array_map('ucfirst', $nameToArray);
            return implode('', $controllerToArray);
        }
        return ucfirst($controller_name);
    }

    /**
     * Generates Controller file
     *
     * @return string
     */
    public function generateController($controller_name, $generate= false)
    {
        $filePath = $this->getControllerDir() . "{$controller_name}Controller.php";
        if ($generate && !file_exists($filePath)) {
            if (file_put_contents($filePath, '<?php ')) {
                return $filePath;
            }
        }
        return $filePath;
    }

}
