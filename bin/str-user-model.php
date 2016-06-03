<?php

$home = getcwd();

switch (true) {
    case file_exists($home . "/vendor/autoload.php"):
        require_once $home . "/vendor/autoload.php";
        break;
    case file_exists($home . "/init_autoloader.php"):
        require_once $home . "/init_autoloader.php";
        break;
    default:
        throw new \RuntimeException('Cannot load autoloader');
        break;
}


switch (true) {
    case file_exists($home . "/config/application.config.php"):
        $config = require_once $home . "/config/application.config.php";
        break;
    default:
        throw new \RuntimeException('Cannot load application config');
        break;
}

Zend\Mvc\Application::init($config)->run();
