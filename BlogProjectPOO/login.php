<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 23/02/15
 * Time: 14:55
 */
if(!isset($_SESSION))
    session_start();

require_once "Helper/DatabaseHelper.class.php";
require_once "Model/User.class.php";


$userManager = new User();

if(array_key_exists("login", $_POST))
{
    if($userManager->verifLogin($_POST["login"], $_POST["pwd"]) != false)
    {
        $_SESSION['id'] = $userManager->getId();
        $_SESSION['email'] = $userManager->getEmail();
        $_SESSION['username'] = $userManager->getUsername();
        $reponse = 'ok';
    }
    else
    {
        $reponse = 'Le login ou le mot de passe est incorrecte';
    }

}

/* Verifie si la requête est fait en AJAX */
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    die($reponse);
}


include_once "View/headView.phtml";
include_once "View/loginView.phtml";
include_once "View/footerView.phtml";