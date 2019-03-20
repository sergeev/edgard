<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Engine\Run;
use Engine\DI\DI;

try{
    // Dependency injection
    $di = new DI();

    $run = new Run($di);
    $run->run();

}catch (\ErrorException $e) {
    echo $e->getMessage();
}