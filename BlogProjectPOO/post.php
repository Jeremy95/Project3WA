<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 23/02/15
 * Time: 14:57
 */
if(!isset($_SESSION))
    session_start();
include_once "View/headView.phtml";
require_once "Helper/DatabaseHelper.class.php";
require_once "Model/Article.class.php";

if(array_key_exists('id', $_SESSION))
{
    $articles = new Article();
    $articlesDisplay = $articles->getArticle();
}
else
{
    echo "<script>
            window.location = 'index.php';
        </script>";
}


include_once "View/homeView.phtml";
include_once "View/footerView.phtml";