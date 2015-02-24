<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 23/02/15
 * Time: 14:56
 */
include_once "View/headView.phtml";
require "Helper/DatabaseHelper.class.php";
require "Model/User.class.php";
include_once "View/registerView.phtml";
include_once "View/footerView.phtml";

$userManager = new User();

if(array_key_exists("email", $_POST) && array_key_exists("pwd", $_POST))
{
    $userManager->addUser(htmlentities($_POST['email']), password_hash($_POST['pwd'], PASSWORD_DEFAULT));
    echo "kjhgf";
}


