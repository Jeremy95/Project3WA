<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 20/02/15
 * Time: 14:13
 */
require "config.php";

$query = $db->prepare("SELECT ville_id, ville_nom
                       FROM villes_france_free
                       WHERE ville_code_postal LIKE :id
                       LIMIT 100");
$query->execute(array(
   ':id' => $_GET["postal_code"].'%'
));

$res = $query->fetchAll(PDO::FETCH_ASSOC);

$json = json_encode($res);

header("Content-Type: application/json");

echo $json;