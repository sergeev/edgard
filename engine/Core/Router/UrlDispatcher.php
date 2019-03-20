<?php
namespace Engine\Core\Router;


class UrlDispatcher
{
    /**
     * @var array
     */
    private $methods = [
        'GET',
        'POST'
    ];

    /**
     * @var array
     */
    private $routes = [
        'GET'   => [],
        'POST'  => []
    ];

    /**
     * @var array
     */
    private $patterns = [
        'int' => '[0-9]+',
        'str' => '[a-zA-Z\.\-_%]+',
        'any' => '[a-zA-Z0\.\-_%]+',
    ];

    /**
     * @param $key
     * @param $pattern
     */
    private function addPattern($key, $pattern)
    {
        $this->patterns[$key] = $pattern;
    }

    /**
     * @param $method
     * @return array|mixed
     */
    private function routes($method )
    {
        return isset($this->routes[$method]) ? $this->routes[$method] : [];
    }

    /**
     * @param $method
     * @param $pattern
     * @param $controller
     */
    public function register($method, $pattern, $controller)
    {
        $this->routes[strtoupper($method)][$pattern] = $controller;
    }

    /**
     * @param $method
     * @param $url
     * @return DispatchedRoute
     */
    public function dispatch($method, $url)
    {
        $router = $this->routes(strtoupper($method));

        // Проверяем ключ
        if(array_key_exists($url, $router))
        {
            return new DispatchedRoute($router[$url]);
        }

        return $this->doDispatch($method, $url);
    }

    /**
     * @param $method
     * @param $url
     */
    private function doDispatch($method, $url)
    {
        foreach ($this->routes($method) as $route => $controller)
        {
            $pattern = '#^' . $route . '$#s';
        }
        if(preg_match($pattern, $url, $parameters))
        {
            return new DispatchedRoute($controller, $parameters);
        }
    }
}