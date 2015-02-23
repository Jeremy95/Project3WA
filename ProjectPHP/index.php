<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 30/01/15
 * Time: 09:42
 */
$name = "Bob";
echo "Hello ".$name;

echo "<ul>";

for($i = 1; $i <= 5; $i++)
{
    echo "<li>".$i."</li>";
}

echo "</ul>";

$tab = array();

for($y = 100; $y < 200; $y+=3)
{
    $tab[] = $y;

}

var_dump($tab);


switch ($_GET["lang"])
{
    case "fr":
        echo "Bonjour";
        break;

    case "en":
        echo "Hello";
        break;

    case "es":
        echo "Hola";
        break;
    default:
        echo "Je ne connais pas votre langue";
}
