<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 19/02/15
 * Time: 13:37
 */
require "config.php";

$query = $db->prepare("SELECT message.id, message.content, message.date, users.name
			  FROM message
			  JOIN users ON message.id_author = users.id
			  WHERE message.id > :id
			  ORDER BY message.id");

$query->execute(array(
   ':id' => $_GET['after']
));

$res = $query->fetchAll(PDO::FETCH_ASSOC);

$json = json_encode($res);

header("Content-Type: application/json");

echo $json;