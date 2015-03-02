<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 23/02/15
 * Time: 14:57
 */
if(!isset($_SESSION))
    session_start();

require_once "Helper/DatabaseHelper.class.php";
require_once "Model/Article.class.php";
require_once "Model/Image.class.php";
require_once "Model/Comment.class.php";
require_once "Model/Tag.class.php";

if(array_key_exists('id', $_SESSION))
{
    if(isset($_GET["id"]))
    {
        $article = new Article();
        $images = new Image();
        $comment = new Comment();
        $tag = new Tag();
        $oneArticle = $article->getArticle($_GET["id"]);
        $oneArticle["image"] = $images->getImgForArticle($_GET["id"]);
        $oneArticle["commentary"] = $comment->getCommentForAnArticle($_GET['id']);
        $oneArticle["tags"] = $tag->getTagForArticle($_GET['id']);
        die(json_encode($oneArticle));
    }
    else if(isset($_POST["content_comment"]))
    {
        $comments = new Comment();
        $id_comment = $comments->setComment($_POST["articleId"], $_POST["content_comment"], $_SESSION["id"]);
        $reponse = null;
        if($id_comment != false)
        {
            $reponse = $comments->getCommentForAnArticle($_POST["articleId"]);
            $lastComment = array_pop($reponse);
        }

        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        {

            die(json_encode($lastComment));
        }
    }
    else
    {
        $articles = new Article();
        $images = new Image();
        $comment = new Comment();
        $tags = new Tag();
        $articlesDisplay = $articles->getArticle();
        foreach($articlesDisplay as &$value)
        {
            $value["image"] = $images->getImgForArticle($value["id"]);
            $value["commentary"] = $comment->getCommentForAnArticle($value['id']);
            $value["tags"] = $tags->getTagForArticle($value["id"]);
        }

        include_once "View/headView.phtml";
        include_once "View/homeView.phtml";
        include_once "View/footerView.phtml";
    }
}
else
{
    include_once "login.php";
}




