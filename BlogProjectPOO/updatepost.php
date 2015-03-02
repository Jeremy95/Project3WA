<?php
/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 27/02/15
 * Time: 00:18
 */

require "initialize.php";

$helper = new Helper_Database();
$article = new Model_Article();
$images = new Model_Image();
$tag = new Model_Tag();

if(array_key_exists("id", $_GET))
{

    $oneArticle = $article->getArticle($_GET["id"]);
    $oneArticle["image"] = $images->getImgForArticle($_GET["id"]);
    $oneArticle["tags"] = $tag->getTagForArticle($_GET['id']);
    die(json_encode($oneArticle));
}

elseif(array_key_exists("articleId", $_POST))
{
    $article->updateAnArticle($_POST["articleId"], $_POST["title"], $_POST["contentArticle"]);

    if(array_key_exists("image", $_FILES))
    {
        for ($i = 0; $i < sizeof($_FILES["image"]["name"]); $i++)
        {
            move_uploaded_file($_FILES["image"]["tmp_name"][$i], "files/".$_FILES["image"]["name"][$i]);
            $path = "files/".$_FILES["image"]['name'][$i];
            //a partir de la une problematique s'impose
            // il attribue l'id de la derniere image ajouté a l'article du coup
            // cette derniere image ajouter ajoutera autant de ligne dans la table img_article
            // que d'image ajouter pa le visiteur
            $idImg = $images->setImg($path);
            $images->updateImgFromArticle($_POST["articleId"], $idImg);
        }
    }

    for($y=0; $y<sizeof($_POST["tags"]); $y++)
    {
        $tag->updateTagFromAnArticle($_POST["idTag"][$y], $_POST["tags"][$y]);
    }

    $helper->location("post.php");

}
