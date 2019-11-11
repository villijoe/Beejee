<?php
/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 08.09.2017
 * Time: 14:03
 */

namespace controllers;
use controllers\Controller;

class AdminController extends Controller
{

    public function actionIndex()
    {
        $this->setTitle("Админ-панель");
        if ($this->app->isAdmin) {
            header("Location: http://" . $_SERVER['HTTP_HOST']);
        } else {
            $this->active[2] = " class='active'";
            include_once ROOT . '/views/admin/index.php';
        }
    }

    public function actionLogin()
    {
        if ($this->app->config['admin_login'] == $_POST['name']
            && $this->app->config['admin_pass'] == $_POST['password']
        ) {
            $_SESSION['admin'] = true;
            header("Location: http://" . $_SERVER['HTTP_HOST']);
        }
    }

    public function actionLogout()
    {
        $_SESSION['admin'] = false;
        header("Location: http://" . $_SERVER['HTTP_HOST']);
    }
}
