<?php
/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 26/02/15
 * Time: 00:04
 */

class Comment
{
    public $id;
    private $db;
    public $content;
    public $id_user;
    public $id_article;

    function __construct()
    {
        $this->db = new DatabaseHelper();
    }

    function getCommentForAnArticle($id_article)
    {
        $res = $this->db->fetchAll("SELECT *
                                    FROM comment
                                    JOIN user
                                    ON user.id = comment.id_user
                                    WHERE id_article = :id_article", array(
            ':id_article' => $id_article
        ));

        return $res;
    }
} 