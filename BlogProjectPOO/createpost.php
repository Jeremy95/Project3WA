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


if(array_key_exists("content", $_POST) && array_key_exists("idUser", $_POST) && array_key_exists("title", $_POST) && array_key_exists("picture", $_FILES) && array_key_exists("tags", $_POST))
{

    if(isset($_FILES))
    {
        for ($i = 0; $i < sizeof($_FILES["picture"]["name"]); $i++)
        {
            if($_FILES["picture"]["name"][$i] != "")
                move_uploaded_file($_FILES["picture"]["tmp_name"][$i], "files/" .$_FILES["picture"]["name"][$i]);
        }
    }

    $id = $articleManager->setArticle(htmlentities($_POST['content']), $_POST['idUser'], htmlentities($_POST['title']));
    /*var_dump($id);
    die();*/
    if($id != false)
    {
        $reponse = "ok";

        $tag = explode(",", $_POST["tags"]);

        for($i=0; $i<sizeof($tag); $i++)
        {
            $tagManager->setTag($id, $tag[$i]);
        }
        

        for($i=0; $i<sizeof($_FILES["picture"]["name"]); $i++)
        {
            $path = "files/".$_FILES["picture"]['name'][$i];

            $idImg = $imageManager->setImg($path);

            $articleManager->setImgsInArticle($id, $idImg);

            header("Location: post.php");
        }

    }



    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {

        die($reponse);
    }
}


include_once "View/headView.phtml";
include_once "View/createPostView.phtml";
include_once "View/footerView.phtml";