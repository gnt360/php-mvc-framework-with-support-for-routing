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
    public Response $response;

    /**
     * Router constructor
     * 
     * @param \app\core\Request $request
     * @param \app\core\Reponse $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
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
            $this->response->setStatusCode(404);
            return "Not found";
        }

        if(is_string($callback))
        {
            return $this->renderView($callback);
        }
        return  call_user_func($callback);
    }

    public function renderView($view)
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);
        return str_replace('{{content}}', $viewContent, $layoutContent);
        include_once Application::$ROOT_DIR."/views/$view.php";
    }

    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();

    }

    protected function renderOnlyView($view)
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();

    }
}