<?php

namespace app\core;
use app\core\Request;
use app\core\Router;

class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;

     /**
     * Application constructor
     * 
     * @param \app\core\Router $router
     * @param \app\core\Request $request
     */

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
       echo $this->router->resolve();
    }
}