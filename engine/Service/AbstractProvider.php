<?php

namespace Engine\Service;

abstract class AbstractProvider
{
    // \Engine\DI\DI;
    protected $di;

    /**
     * @param \Engine\DI\DI $di
     */
    public function __construct(\Engine\DI\DI $di)
    {
        $this->di = $di;
    }

    /**
     * @return mixed
     */
    abstract function init();
}
