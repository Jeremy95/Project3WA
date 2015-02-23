<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 19/02/15
 * Time: 09:29
 */

$db = new PDO("mysql:host=localhost; dbname=classroom", "root", "troiswa");
$db->exec("SET NAMES UTF8");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
