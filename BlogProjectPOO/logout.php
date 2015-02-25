<?php
/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 24/02/15
 * Time: 10:00
 */
session_start();
$_SESSION = array();//on efface toutes les variables de la session
session_destroy();
header("Location: index.php");
exit();
