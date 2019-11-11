<?php
/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 30.09.2017
 * Time: 9:36
 */

namespace controllers;

use components\App;

class Controller
{
    public $app;
    public $title;
    public $active = ["", "", ""];
    
    public function __construct()
    {
        $this->app = new App();
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }
}
