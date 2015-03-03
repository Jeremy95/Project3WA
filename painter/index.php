<?php
/**
 * Created by PhpStorm.
 * User: wap20
 * Date: 03/03/15
 * Time: 09:55
 */

//Trois class (program / shape / moteur de rendu)


spl_autoload_register("my_autoload");

function my_autoload($class)
{
   $file = $class.".class.php";
    if(file_exists($file)){
        require_once($file);
    }

}


$program = new Program();
$renderer = new Svg_renderer();
$program->run($renderer);

include "template.phtml";