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
        $this->router->add('product', '/user/12', 'ProductController:index');

        $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());
        //print_r($_SERVER);
        //echo Common::getMethod();
        print_r($routerDispatch);
    }
}