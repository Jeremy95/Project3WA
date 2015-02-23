<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 19/02/15
 * Time: 11:56
 */

require "config.php";

if(array_key_exists("name", $_POST) && array_key_exists("mdp", $_POST))
{
    $query = $db->prepare('INSERT INTO users(name, password)
                       VALUES (:nom, :mdp)');
    $query->execute(array(
        ':nom' => $_POST["name"],
        ':mdp' => password_hash($_POST["mdp"], PASSWORD_DEFAULT)
    ));

    $_SESSION['message'] = "Félicitations vous avez été enregistré";
}
else
{
    $_SESSION['message'] = "Il faut remplir tout les champs !";
}

header("Location: search.php");