<?php

/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 06.06.2017
 * Time: 0:02
 */

namespace controllers;

use components\Db;
use models\Pagination;
use models\TaskSearch;

class SiteController extends Controller
{
    /**
     * @param int $page
     * @param string $name
     * @param string $email
     * @param int $closed
     * @param string $link
     */
    public function actionIndex($page = 1, $name = '', $email = '', $closed = 0, $link = '')
    {
        $this->setTitle("Главная");

        $search = new TaskSearch($name, $email, $closed, $page);
        $this->active[0] = " class='active'";
        $stmt = $search->getResponse();

        include_once(ROOT . '/views/site/index.php');
        $pagination = new Pagination(intval($page), $link, $search->getCondition(), 3);
        $pagination->showPagination();
    }

    /**
     * @return void
     */
    public function actionEdit()
    {
        $id = intval($_POST['id']);
        $text = htmlspecialchars($_POST['text']);
        $db = Db::getConnection();
        $db->query("UPDATE `task` SET `text`='$text' WHERE id=$id");
        echo htmlspecialchars_decode($text);
    }

    /**
     * @param $id
     * @param $closed
     *
     * @return void
     */
    public function actionSort($id, $closed)
    {
        $db = Db::getConnection();
        $id = htmlspecialchars(intval($id));
        $closed = $closed ? 0 : 1;
        $db->query("UPDATE `task` SET `closed`=$closed WHERE id=$id");
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

}
