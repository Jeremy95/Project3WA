<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 20/02/15
 * Time: 15:01
 */

require "config.php";

$query = $db->prepare('INSERT INTO student(name, birthday, city_id)
                       VALUES(:name, :birthday, :city_id)');

$res = $query->execute(array(
    ':name' => htmlentities($_POST['name']),
    ':birthday' => $_POST['birthday'],
    ':city_id' => $_POST['city_id']
));

if($res)
{
    echo "ok";
}
