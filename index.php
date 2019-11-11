<?php

use components\Router;

// вывод всех ошибок
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// подключение всех файлов
define('ROOT', dirname(__FILE__));


spl_autoload_register(function ($class) {
    include_once(ROOT . "/" . $class . ".php");
});

// вызов Router
$router = new Router();
$router->run();
