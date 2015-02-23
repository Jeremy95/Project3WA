<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 20/02/15
 * Time: 10:12
 */
require "config.php";

$query = $db->prepare("SELECT *
                       FROM city
                       WHERE name LIKE :pattern
                        OR postal_code LIKE :pattern
                        LIMIT 100");
$query->execute(array(
    ":pattern" => $_GET['pattern'].'%'
));

$res = $query->fetchAll(PDO::FETCH_ASSOC);

$json = json_encode($res);

header("Content-Type: application/json");

echo $json;