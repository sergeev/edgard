<?php 
    // Front

    // All settings
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Include system files
    define('ROOT', dirname(__FILE__));
    require_once(ROOT.'/components/Router.php');

    // Database settings


    // Call Router
    $roter = new Router();
    $roter ->run();