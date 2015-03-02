<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 23/02/15
 * Time: 14:57
 */
if(!isset($_SESSION))
    session_start();

require "Helper/DatabaseHelper.class.php";
require "Model/Article.class.php";
require "Model/Image.class.php";
require "Model/Tag.class.php";
require "Model/Comment.class.php";


$articleManager = new Article();
$helperDatabase = new DatabaseHelper();
$imageManager = new Image();
$tagManager = new Tag();
$commentManager = new Comment();

if(array_key_exists("id", $_GET))
{
    if($articleManager->deleteArticle($_GET["id"]))
    {
        $imageManager->deleteFromImgArticle($_GET['id']);
        $tagManager->updateTagWithoutArticle($_GET["id"]);
        $commentManager->deleteCommentWithoutArticle($_GET["id"]);
        $helperDatabase->location("post.php");
    }

}