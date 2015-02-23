<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 06/02/15
 * Time: 09:48
 */

include "utilities.php";

if(array_key_exists("id", $_GET))
{
    removeCsvData("todo.csv", $_GET["id"]);
}

$data = getCsvData("todo.csv");

include "layoutFormList.phtml";