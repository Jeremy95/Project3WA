<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 19/02/15
 * Time: 10:02
 */
require "config.php";

$query = $db->prepare("DELETE
                       FROM message
                       WHERE id = :id_message");
$query->execute(array(
   ":id_message" => $_GET["id_message"]
));

header('Location : search.php');