<?php

namespace Engine;

use Engine\Helper\Common;

// Запуск системы DI
class Run
{
    private $di;

    public $router;

    /**
     * Run constructor.
     * @param $di
     */
    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

    /**
     * Run App
     */
    public function run()
    {
        $this->router->add('home', '/', 'HomeController:index');
        //$this->router->add('product', '/user/12', 'ProductController:index');

        $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());
        //print_r($_SERVER);
        //echo Common::getMethod();



        list($class, $action) = explode(':', implode($routerDispatch->getController()),2);

        print_r($class);
        echo '<br>1';
        print_r($action);
        echo '<br>2';

        $controller = '\\Cms\\Controller\\' . $class;
        call_user_func_array([new $controller($this->di), $action], $routerDispatch->getParameters());

        //print_r($routerDispatch);
    }
}