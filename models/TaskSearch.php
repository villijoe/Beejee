<?php

/**
 * @package models
 */

namespace models;

use components\Db;

/**
 * Class TaskSearch
 * @package models
 */
class TaskSearch
{
    private $name;
    private $email;
    private $closed;
    private $limit = 3;
    private $page;
    private $condition;

    /**
     * TaskSearch constructor.
     * @param $name
     * @param $email
     * @param $closed
     * @param $page
     */
    public function __construct($name, $email, $closed, $page)
    {
        $this->name = $name;
        $this->email = $email;
        $this->closed = intval($closed);
        $this->page = $page;
    }

    public function getResponse()
    {
        $this->condition = $this->getCondition();
        $offset = $this->limit * $this->page - $this->limit;

        $db = Db::getConnection();
        $sql = 'SELECT * FROM task ' . $this->condition . ' LIMIT ' . $this->limit
        . ' OFFSET ' . $offset;
        $stmt = $db->query($sql);
        return $stmt;
    }

    /**
     * @return string
     */
    public function getCondition()
    {
        $condition = '';
        //$condition = $this->addWhere($condition, $this->name ? "name LIKE '%" . $this->name . "%'" : "");
        //$condition = $this->addWhere($condition, $this->email ? "email LIKE '%" . $this->email . "%'" : "");
        $arr_closed = ['name ASC', 'name DESC', 'email ASC', 'email DESC', 'closed ASC', 'closed DESC'];
        $condition = $this->addOrderBy($condition, $arr_closed[$this->closed]);
        return $condition;
    }

    public function addOrderBy($condition, $val){
        if ($val != '') {
            $condition .= "ORDER BY " . $val;
        } else {
            $condition .= "ORDER BY id DESC";
        }
        return $condition;
    }

    /**
     * @param $condition
     * @param $val
     * @return string
     */
    public function addWhere($condition, $val)
    {
        if ($val != '') {
            if (substr_count($condition, 'WHERE') == 0) {
                $condition .= "WHERE " . $val;
            } else {
                $condition .= " AND " . $val;
            }
        }
        return $condition;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name . ' ' . $this->email . ' ' . $this->closed . ' ' . $this->page;
    }
}
