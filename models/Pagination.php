<?php
/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 19.11.2017
 * Time: 17:51
 */

namespace models;

use components\Db;
use PDO;

/**
 * Class Pagination
 * @package models
 */
class Pagination
{

    private $common_pages;
    private $current_page;
    private $post_link;
    private $limit;

    /**
     * Pagination constructor.
     * @param $current_page
     * @param $link
     * @param $condition
     * @param $limit
     */
    public function __construct($current_page, $link, $condition, $limit)
    {
        $this->current_page = $current_page;
        $this->post_link = $link;
        $this->limit = $limit;
        $this->common_pages = $this->getCountPages($condition);
    }

    /**
     * Show block pagination with total pages and current page tagged
     */
    public function showPagination()
    {
        echo "<ul class='pagination'>";
        for ($i = 1; $i <= $this->common_pages; $i++) {
            $active = "";
            if ($i == $this->current_page) {
                $active = " class='active'";
            }
            echo "<li$active><a href='http://" . $_SERVER['HTTP_HOST'] . "/page/$i/$this->post_link'>$i</a></li>";
        }
        echo "</ul>";
    }

    /**
     * Counts how many pages in this query
     *
     * @param $condition
     * @return float
     */
    public function getCountPages($condition)
    {
        $db = Db::getConnection();
        $query = $db->query('SELECT COUNT(*) as count FROM task ' . $condition);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $row = $query->fetch();
        $count_pages = $row['count'];
        return ceil($count_pages / $this->limit);
    }
}
