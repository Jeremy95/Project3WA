<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 05/02/15
 * Time: 13:51
 */
include "utilities.php";

if (empty($_POST) == false)
{
    if(empty($_POST['title']))
    {
        $message = "You have to give a title";
    }
    else if(empty($_POST['description']))
    {
        $message = "You have to give a description";
    }
    else if(empty($_POST['date']))
    {
        $message = "You have to give a date";
    }
    else if(empty($_POST['priority']))
    {
        $message = "You have to give a priority";
    }
    else
    {
        $data = array(
            0 => $_POST['title'],
            1 => $_POST['description'],
            2 => $_POST['date'],
            3 => $_POST['priority']
        );

        putCsvData("todo.csv",$data);

        $message = "Your data were recorded  <a href='list.php'>Cliquez ici</a>";
    }


}

include "layoutFormAdd.phtml";