<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 25/02/15
 * Time: 11:59
 */

class Image
{
    public $id;
    private $db;
    public $url;

    function __construct()
    {
        $this->db = new DatabaseHelper();
    }

    function getId()
    {
        return $this->id;
    }

    function setImg($url)
    {
        $id = $this->db->insertIntoDatabase("INSERT INTO image(url)
                                       VALUES (:url)", array(
            ':url' => $url
        ));


        if($id != false)
        {
            $this->id = $id;
            return $id;
        }
        else
            return false;

    }

    function getImgForArticle($idArticle)
    {
        $res = $this->db->fetchAll("SELECT *
                                    FROM image
                                    JOIN img_article
                                    ON image.id = img_article.id_img
                                    WHERE img_article.id_article = $idArticle");

        return $res;
    }

}