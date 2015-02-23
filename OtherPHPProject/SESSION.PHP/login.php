<?php
/**
 * Created by PhpStorm.
 * User: wap20
 * Date: 18/02/15
 * Time: 11:42
 */

require "config.php";

if(array_key_exists("login", $_POST) && array_key_exists("password", $_POST))
{
    $query = $db->prepare("SELECT *
                             FROM users
                             WHERE users.name = :line");

    $query->execute(array(":line" => $_POST["login"]));
    $res = $query->fetch(PDO::FETCH_ASSOC);

    if($res)
    {
        if(password_verify($_POST['password'], $res['password']) && $_POST["password"] != null)
        {
            $_SESSION["name"] = $res["name"];
            $_SESSION["id"] = $res["id"];

            header("Location: search.php");
        }
        else
        {
            $_SESSION["error"] = "Mot de passe incorrect";
        }
    }
    else
    {
        $_SESSION["error"] = "utilisateur inconnu";
    }
}







