<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 05/02/15
 * Time: 14:55
 */

include "utilities.php";

$data = getCsvData("todo.csv");

if(array_key_exists("line", $_POST))
{
    removeCsvData("todo.csv", $_POST["line"]);

    header("location: list.php");
}

include "layoutFormRemove.phtml";