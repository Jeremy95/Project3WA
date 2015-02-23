<?php
/**
 * Created by PhpStorm.
 * User: wap20
 * Date: 18/02/15
 * Time: 16:42
 */

require "config.php";


if(array_key_exists("id", $_SESSION))
{
    $query = $db -> prepare("INSERT INTO message(id_author, content)
                             VALUES(:id, :message);
    ");
    $query->execute(array(
        ":id" => $_SESSION["id"],
        ":message" => htmlentities($_POST["content"])
    ));
}

header("Location: search.php");