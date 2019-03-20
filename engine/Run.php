<?php

namespace Engine;

// Запуск системы DI
class Run
{
    private $di;

    /**
     * Run constructor.
     * @param $di
     */
    public function __construct($di)
    {
        $this->di = $di;
    }

    /**
     * Run App
     */
    public function run()
    {
        echo 'App is RUN()';
        return $this->di;
    }
}