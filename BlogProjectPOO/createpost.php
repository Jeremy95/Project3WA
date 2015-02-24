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
require "Helper/DatabaseHelper.class.php";
require "Model/Article.class.php";
include_once "View/createPostView.phtml";
include_once "View/footerView.phtml";

$articleManager = new Article();
if(array_key_exists("content", $_POST) && array_key_exists("idUser", $_POST) && array_key_exists("title", $_POST))
{
    $articleManager->setArticle(htmlentities($_POST['content']), $_POST['idUser'], htmlentities($_POST['title']));
    echo "koiwp";
}
