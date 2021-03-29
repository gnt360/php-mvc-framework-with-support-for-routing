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

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if($callback === false)
        {
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
        }

        if(is_string($callback))
        {
            return $this->renderView($callback);
        }

        if(is_array($callback))
        {
            $callback[0] = new $callback[0]();
        }
        return  call_user_func($callback, $this->request);
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
        include_once Application::$ROOT_DIR."/views/$view.php";
    }

    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();

    }

    protected function renderOnlyView($view, $params)
    {
        foreach($params as $key => $value)
        {
            $$key = $value;  // $$key: if key is name
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();

    }
}