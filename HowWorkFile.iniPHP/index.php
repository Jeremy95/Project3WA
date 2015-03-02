<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 02/03/15
 * Time: 13:46
 */

$config = parse_ini_file("config.ini", true);

var_dump($config["database"]["user"]);