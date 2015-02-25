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

if(array_key_exists('id', $_SESSION))
{
    if(isset($_GET["id"]))
    {
        $article = new Article();
        $images = new Image();
        $oneArticle = $article->getArticle($_GET["id"]);
        $oneArticle["image"] = $images->getImgForArticle($_GET["id"]);
        $reponse = "ok";

        /* Verifie si la requête est fait en AJAX */
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

            die($reponse);
        }

        include_once "View/headView.phtml";
        include_once "View/singleArticleView.phtml";
        include_once "View/footerView.phtml";
    }
    else
    {
        $articles = new Article();
        $images = new Image();
        $articlesDisplay = $articles->getArticle();
        foreach($articlesDisplay as &$value)
        {
            $value["image"] = $images->getImgForArticle($value["id"]);
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




