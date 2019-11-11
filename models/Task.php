<?php


namespace models;

use components\Db;

/**
 * Class Task
 * @package models
 */
class Task
{
    private $class_name = __CLASS__;
    private $db;

    public function __construct()
    {
        $this->db = Db::getConnection();
    }

    /**
     * @return string
     */
    public function getDbName()
    {
        return strtolower($this->class_name);
    }

    /**
     * @param array $post
     */
    public function save(array $post)
    {
        $query = "INSERT INTO `task`(`name`, `email`, `text`, `image`) VALUES(?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute($post);
    }

    /**
     * @param $outfile
     * @param $infile
     * @param $neww
     * @param $newh
     * @param $quality
     */
    public function imageResize($outfile, $infile, $neww, $newh, $quality)
    {
        $im=imagecreatefromjpeg($infile);
        $im1=imagecreatetruecolor($neww, $newh);
        imagecopyresampled($im1, $im, 0, 0, 0, 0, $neww, $newh, imagesx($im), imagesy($im));
        ob_start();
        imagejpeg($im1, $outfile, $quality);
        $data = ob_get_contents();
        ob_end_clean();
        imagedestroy($im);
        imagedestroy($im1);
    }
}
