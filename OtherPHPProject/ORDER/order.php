<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 17/02/15
 * Time: 09:32
 */
$db = new PDO("mysql:host=localhost;dbname=classicmodels", "root", "troiswa");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);