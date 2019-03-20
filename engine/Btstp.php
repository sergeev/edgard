<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Engine\Run;
use Engine\DI\DI;

try{
    // Dependency injection
    $di = new DI();

    // $services = $config;
    $services = require __DIR__ . '/Config/Service.php';

    // Init service
    foreach ($services as $service)
    {
        $provider = new $service($di);
        $provider->init();
    }

    $run = new Run($di);
    $run->run();

}catch (\ErrorException $e) {
    echo $e->getMessage();
}