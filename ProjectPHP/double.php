<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 30/01/15
 * Time: 11:22
 */

if(array_key_exists("nb", $_GET))
{
    $double = $_GET["nb"]*2;
    echo $double;
}
else{
    echo "Vous devez rentrez un nombre";
}

var_dump($_POST);

