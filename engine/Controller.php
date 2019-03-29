<?php

namespace Engine;

use Engine\DI\DI;

abstract class Controller
{
    /*
     * @var \Engine\DI\DI
     */
    protected $di;

    protected $db;

    /**
     * HomeController constructor.
     * @param DI $id
     */
    public function __construct(DI $id)
    {
        $this->di = $id;
    }
}