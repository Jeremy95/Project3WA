<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 23/02/15
 * Time: 14:56
 */
if(!isset($_SESSION))
    session_start();

require "Helper/DatabaseHelper.class.php";
require "Model/User.class.php";


$userManager = new User();

if(array_key_exists("email", $_POST) && array_key_exists("pwd", $_POST) && array_key_exists("name", $_POST))
{
    $userManager->setUser(htmlentities($_POST['email']), password_hash($_POST['pwd'], PASSWORD_DEFAULT), htmlentities($_POST['name']));

    $reponse = "ok";

    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
        die($reponse);
    }
}

include_once "View/headView.phtml";
include_once "View/registerView.phtml";
include_once "View/footerView.phtml";