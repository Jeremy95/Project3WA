<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 02/03/15
 * Time: 14:22
 */
if(!isset($_SESSION))
    session_start();

spl_autoload_register("my_autoload");

function my_autoload($class)
{
    $class = str_replace("_", "/", $class);
    if(file_exists($class.".class.php"))
        require $class.".class.php";
}