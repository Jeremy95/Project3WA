<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 23/02/15
 * Time: 14:55
 */
if(!isset($_SESSION))
    session_start();
include_once "View/headView.phtml";
require_once "Helper/DatabaseHelper.class.php";
require_once "Model/User.class.php";
include_once "View/loginView.phtml";
include_once "View/footerView.phtml";

$userManager = new User();
$message = "";
if(array_key_exists("login", $_POST))
{
    if($userManager->verifLogin($_POST["login"], $_POST["pwd"]) != false)
    {
        $message = "ok";
        $_SESSION['id'] = $userManager->getId();
        $_SESSION['email'] = $userManager->getEmail();
        $_SESSION['username'] = $userManager->getUsername();
    }
    else
    {
        $message = "Votre login ou votre mot de passe est incorrect";
    }

    $json = json_encode($message);
    echo $json;

}


