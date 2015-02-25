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
    public $publishedDate;

    public function __construct()
    {
        $this->db = new DatabaseHelper();
    }

    function setArticle($contentArticle, $idUser, $title)
    {
        $this->db->insertIntoDatabase("INSERT INTO article(content_article, id_user, title)
                                       VALUES(:content_article, :idUser, :title)", array(
            ':content_article' => $contentArticle,
            ':idUser' => $idUser,
            ':title' => $title
        ));
    }

    function getArticle()
    {
        $res = $this->db->fetchAll("SELECT *
                             FROM article
                             JOIN user
                             ON user.id = article.id_user
                             ORDER BY date_article DESC");

        return $res;
    }
} 