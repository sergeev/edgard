<?php

namespace Engine;

// Запуск системы DI
class Run
{
    private $di;

    public $db;

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
        //echo 'Hello';
        print_r($this->di);
    }
}