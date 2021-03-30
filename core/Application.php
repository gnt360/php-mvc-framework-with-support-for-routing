<?php

namespace app\core;
use app\core\Database;
use app\core\Router;
use app\core\Request;

class Application
{
    public static string $ROOT_DIR;    
    public static Application $app;
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public Database $db;

     /**
     * Application constructor
     * 
     * @param \app\core\Router $router
     * @param \app\core\Request $request
     * @param \app\core\Response $response
     */

    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['db']);
    }

    public function run()
    {
       echo $this->router->resolve();
    }
    
    public function getController()
    {
        return $this->controller;
    }

    public function setController()
    {
        $this->controller = $controller;
    }
}