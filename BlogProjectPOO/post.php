<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 23/02/15
 * Time: 14:57
 */
require "initialize.php";

$article = new Model_Article();
$images = new Model_Image();
$comment = new Model_Comment();
$tag = new Model_Tag();

if(array_key_exists("page", $_GET) == false)
{
    $page = 1;
}
else if(is_numeric($_GET["page"]) == false)
{
    $page = 1;
}
else
{
    $page = $_GET["page"];
}

$max = 3;
$min = ($page - 1)*$max;

if(array_key_exists('id', $_SESSION))
{
    if(isset($_GET["id"]))
    {
        $oneArticle = $article->getArticle($_GET["id"]);
        $oneArticle["image"] = $images->getImgForArticle($_GET["id"]);
        $oneArticle["commentary"] = $comment->getCommentForAnArticle($_GET['id']);
        $oneArticle["tags"] = $tag->getTagForArticle($_GET['id']);
        die(json_encode($oneArticle));
    }
    else if(isset($_POST["content_comment"]))
    {
        $comments = new Model_Comment();
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

        $articlesDisplay = $article->getArticle(false, $min, $max);
        $count = $article->countArticle() / $max;
        for($i=0; $i<sizeof($articlesDisplay); $i++)
        {
            $articlesDisplay[$i]["image"] = $images->getImgForArticle($articlesDisplay[$i]["id"]);
            $articlesDisplay[$i]["commentary"] = $comment->getCommentForAnArticle($articlesDisplay[$i]['id']);
            $articlesDisplay[$i]["tags"] = $tag->getTagForArticle($articlesDisplay[$i]["id"]);
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




