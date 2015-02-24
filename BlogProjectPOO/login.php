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

if(isset($reponse))
    echo json_encode(['reponse' => $reponse]);


