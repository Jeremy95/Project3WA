<?php
/**
 * Created by PhpStorm.
 * User: wap20
 * Date: 18/02/15
 * Time: 11:42
 */

session_start();
$_SESSION=array();//on efface toutes les variables de la session
session_destroy();
header("location: search.php");
exit();

