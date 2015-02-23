<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 30/01/15
 * Time: 11:36
 */

$titre = "Titre de la page";
$message = "";

if(array_key_exists("number", $_POST))
{
    if(!empty(trim($_POST["number"])) && is_numeric($_POST["number"]))
    {
        $message = $_POST["number"]*2;
    }
    else
    {
        $message = "Entrez un nombre";
    }
}



include "layout.phtml";