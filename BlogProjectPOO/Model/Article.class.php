<?php
/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 24/02/15
 * Time: 11:27
 */

class Model_Article
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
        $this->db = new Helper_Database();
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

    function getArticle($id = false, $min = 0, $max = 0)
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
                             ORDER BY date_article DESC
                             LIMIT $min,$max");

        }

        return $res;
    }

    function countArticle()
    {
        $res = $this->db->fetchOne("SELECT COUNT(*)
                                    AS total
                                    FROM article");

        return $res["total"];
    }

    function deleteArticle($id_article)
    {
        $bool = $this->db->deleteIntoDatabase("DELETE FROM article WHERE id = :id_article",array(
            ':id_article' => $id_article
        ));

        if($bool != 0)
            return true;
        else
            return false;
    }


    function setImgsInArticle($id_article, $id_img)
    {
        $this->db->insertIntoDatabase("INSERT INTO img_article (id_img, id_article)
                                       VALUES (:id_img, :id_article)", array(
            ':id_img' => $id_img,
            ':id_article' => $id_article
        ));
    }

    function updateAnArticle($id_article, $title_article, $content_article)
    {
        $this->db->updateIntoDatabase("UPDATE article
                                       SET content_article = :content_article,
                                       title = :title
                                       WHERE id = :id_article", array(
            ':content_article' => $content_article,
            ':title' => $title_article,
            ':id_article' => $id_article
        ));
    }
} 