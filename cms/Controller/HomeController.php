<?php

namespace Cms\Controller;

use Engine\Controller;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     * @param DI $id
     */
    public function __construct($id)
    {
        parent::__construct($id);
    }

    public function index()
    {
        echo 'index page';
    }
}