<?php

/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 11.06.2017
 * Time: 10:16
 */
namespace controllers;

use models\Task;
use controllers\Controller;

class TaskController extends Controller
{
    public function actionAdd()
    {
        $this->setTitle("Добавление задачи");
        $this->active[1] = " class='active'";
        include_once(ROOT . '/views/task/add.php');
    }

    /**
     *
     */
    public function actionSave()
    {
        $this->setTitle("Задача сохранена");
        $name = $_POST['name'];
        $email = $_POST['email'];
        $text = $_POST['text'];
        $img = '/img/' . strtotime("now") . '.jpg';
        $filePath = $_FILES['file']['tmp_name'];
        $model = new Task();
        $model->save([$name, $email, $text, $img]);
        $model->imageResize(ROOT . $img, $filePath, 320, 240, 75);
        header("Location: http://" . $_SERVER['HTTP_HOST']);
        //include_once(ROOT . '/views/task/save.php');
    }
}
