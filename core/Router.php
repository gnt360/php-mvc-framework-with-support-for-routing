<?php

namespace app\core;

use app\core\Request;
/**
 * Class Router
 * @package app\core
 */
class Router
{
    protected array $routes = [];
    public Request $request;

    /**
     * Router constructor
     * 
     * @param \app\core\Request $request
     */
    public function __construct()
    {
        
        $this->request = new Request();
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if($callback === false)
        {
            echo "Not found";
            exit;
        }

      echo  call_user_func($callback);
    }
}