<?php
/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 26/02/15
 * Time: 18:29
 */

class Tag
{
    public $id;
    private $db;

    function __construct()
    {
        $this->db = new DatabaseHelper();
    }

    function getTagForArticle($id_article)
    {
        $res = $this->db->fetchAll("SELECT *
                                    FROM tag
                                    WHERE id_article = :id_article", array(
            ':id_article' => $id_article
        ));

        return $res;
    }

    function setTag($id_article, $content_tag)
    {
        $id = $this->db->insertIntoDatabase("INSERT INTO tag(content_tag, id_article)
                                       VALUES (:content_tag, :id_article)", array(
            ':content_tag' => $content_tag,
            ':id_article' => $id_article
        ));

        if($id != false)
            return $id;
        else
            return false;
    }

    function updateTagWithoutArticle($id_article)
    {
        $this->db->updateIntoDatabase("UPDATE tag SET id_article = 0
                                       WHERE id_article = :id_article", array(
            ':id_article' => $id_article
        ));
    }

    function updateTagFromAnArticle($id_tag, $content_tag)
    {
        $this->db->updateIntoDatabase("UPDATE tag
                                       SET content_tag = :content_tag
                                       WHERE id = :id_tag", array(
            ':content_tag' => $content_tag,
            ':id_tag' => $id_tag
        ));
    }
} 