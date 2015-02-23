<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 23/02/15
 * Time: 14:55
 */
include_once "View/headView.phtml";
require "Helper/DatabaseHelper.class.php";
require "Model/User.class.php";
include_once "View/loginView.phtml";
include_once "View/footerView.phtml";

$userManager = new User();

if(array_key_exists("login", $_POST))
{
    if($userManager->verifLogin($_POST["login"], $_POST["pwd"]) != false)
    {
        include_once "post.php";
    }
}


