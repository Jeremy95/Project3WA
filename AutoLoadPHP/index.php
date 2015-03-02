<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 02/03/15
 * Time: 13:57
 */

spl_autoload_register("my_autoload");

function my_autoload($class)
{
    $class = str_replace("_", "/", $class);
    if(file_exists($class.".php"))
        require $class.".php";
}

//require "Model/aa.php";
/*require "Model/bb.php";
require "Helper/cc.php";
require "Helper/dd.php";*/


$aa = new Model_aa();
$bb = new Model_bb();
$cc = new Helper_cc();
$dd = new Helper_dd();


