<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 17/02/15
 * Time: 14:44
 */
require "order.php";


$query = $db->prepare('SELECT *
                       FROM orders o
                       JOIN orderdetails od
                       ON o.orderNumber = od.orderNumber
                       JOIN customers cs
                       ON cs.customerNumber = o.customerNumber
                       JOIN products p
                       ON p.productCode = od.productCode
                       WHERE o.orderNumber = :orderNumber');
$query->execute(array(
    ':orderNumber' => !empty($_GET["orderNumber"]) ? $_GET["orderNumber"] : 0
));
$ordersDetails = $query->fetchAll(PDO::FETCH_ASSOC);



$query = $db->prepare('SELECT SUM(quantityOrdered*priceEach) AS totalHT
                       FROM orderdetails
                       WHERE orderNumber = :orderNumber');
$query->execute(array(
    ':orderNumber' => !empty($_GET["orderNumber"]) ? $_GET["orderNumber"] : 0
));
$montant = $query->fetch(PDO::FETCH_ASSOC);

include "order-template.phtml";