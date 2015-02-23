<?php
/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 21/02/15
 * Time: 22:59
 */
require "config.php";

$query = $db->prepare('SELECT *
                       FROM student
                       WHERE id >=:id
                       ORDER BY id DESC');
$query->execute(array(
    ':id' => $_GET['id']
));

$res = $query->fetchAll(PDO::FETCH_ASSOC);

$json = json_encode($res);

header("Content-Type: application/json");

echo $json;