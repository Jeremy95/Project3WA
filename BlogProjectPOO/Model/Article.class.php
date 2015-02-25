<?php
/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 24/02/15
 * Time: 11:27
 */

class Article
{
    public $id;
    public $title;
    private $db;
    public $content;
    public $id_author;
    public $id_img;
    public $publishedDate;

    public function __construct()
    {
        $this->db = new DatabaseHelper();
    }

    function setArticle($contentArticle, $idUser, $title)
    {
        $id = $this->db->insertIntoDatabase("INSERT INTO article(content_article, id_user, title)
                                       VALUES(:content_article, :idUser, :title)", array(
            ':content_article' => $contentArticle,
            ':idUser' => $idUser,
            ':title' => $title
        ));

        if($id != false)
            return $id;
        else
            return false;

    }

    function getArticle($id = false)
    {
        if($id != false)
        {
             $res = $this->db->fetchOne("SELECT a.*, u.username, u.id as id_user
                             FROM article a
                             JOIN user u
                             ON u.id = a.id_user
                             WHERE a.id = :id
                             ORDER BY date_article DESC", array(
                 ':id' => $id
             ));
        }
        else
        {
            $res = $this->db->fetchAll("SELECT a.*, u.username, u.id as id_user
                             FROM article a
                             JOIN user u
                             ON u.id = a.id_user
                             ORDER BY date_article DESC");


        }

        return $res;
    }


    function setImgsInArticle($id_article, $id_img)
    {
        $this->db->insertIntoDatabase("INSERT INTO img_article (id_img, id_article)
                                       VALUES (:id_img, :id_article)", array(
            ':id_img' => $id_img,
            ':id_article' => $id_article
        ));
    }
} 