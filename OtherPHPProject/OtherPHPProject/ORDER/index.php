<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 17/02/15
 * Time: 09:32
 */
require "order.php";

/**
 *
 */
$query = $db->prepare('SELECT * FROM products LIMIT 10');
$query->execute();
$products = $query->fetchAll(PDO::FETCH_ASSOC);


/**
 *
 */
if(array_key_exists('productLine', $_GET))
{
    $productLine = $_GET["productLine"];
    $query = $db->prepare("SELECT *
                            FROM products
                            WHERE productLine = :line
                            AND MSRP BETWEEN :min AND :max");

    $query->execute(array(
        ":line" => "Motorcycles",
        ":min" => 50,
        ":max" => 100
    ));

    $res = $query->fetchAll(PDO::FETCH_ASSOC);
}


/**
 *
 */
$query = $db->prepare('SELECT * FROM productlines');
$query->execute();
$lineProduct = $query->fetchAll(PDO::FETCH_ASSOC);


/**
 * Requête pour formulaire
 */
if(array_key_exists('line', $_POST) || array_key_exists('min', $_POST) || array_key_exists('max', $_POST))
{
    $query = $db->prepare("SELECT *
                            FROM products
                            WHERE productLine = :productLine
                            AND MSRP BETWEEN :min AND :max");
    $query->execute(array(
        ':productLine' => $_POST['line'],
        ':min' => empty($_POST['min']) ? 0 : $_POST['min'],
        ':max' => empty($_POST['max']) ? PHP_INT_MAX : $_POST['max']
    ));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

}

/**
 *
 */
$query = $db->prepare('SELECT * FROM orders');
$query->execute();
$orders = $query->fetchAll(PDO::FETCH_ASSOC);


include "template.phtml";
