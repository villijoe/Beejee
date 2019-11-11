<?php
/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 30.09.2017
 * Time: 9:33
 */

namespace components;


class App
{
    public $config;
    public $isAdmin;

    public function __construct()
    {
        $this->config = include(ROOT . "/config/config.php");
        $this->isAdmin = $_SESSION['admin'] ? true : false;
    }
}