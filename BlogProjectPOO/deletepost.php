<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 23/02/15
 * Time: 14:57
 */

require "initialize.php";


$articleManager = new Model_Article();
$helperDatabase = new Helper_Database();
$imageManager = new Model_Image();
$tagManager = new Model_Tag();
$commentManager = new Model_Comment();

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