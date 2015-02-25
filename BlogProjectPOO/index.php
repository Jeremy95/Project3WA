<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 23/02/15
 * Time: 14:17
 */
if(!isset($_SESSION))
{
    session_start();
    include_once "login.php";
}
else
{
    if(array_key_exists("id", $_SESSION))
        include_once "post.php";
}

