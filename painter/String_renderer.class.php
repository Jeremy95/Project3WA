<?php
/**
 * Created by PhpStorm.
 * User: wap20
 * Date: 03/03/15
 * Time: 12:09
 */

class String_renderer extends Renderer

{
    public function drawCircle($origin, $color, $opacity, $radius)
    {
        return " On dessine un cercle aux coordonnées ".$origin->x." et ".$origin->y.
        ", de couleur ".$color.", d'opacité : ".$opacity." et de "
        .$radius."px.</br>";
    }

    public function drawEllipse($origin, $color, $opacity, $xRadius, $yRadius)
    {
        return " On dessine une ellipse aux coordonnées ".$origin->x." et ".$origin->y.
        ", de couleur ".$color.", d'opacité : ".$opacity." et de ".$xRadius.
        "px et ".$yRadius."px de rayons.</br>";
    }

    public function drawRectangle($origin, $color, $opacity, $width, $height)
    {
        return " On dessine un rectangle aux coordonnées ".$origin->x." et ".$origin->y.
        ", de couleur ".$color.", d'opacité : ".$opacity." et de ".$width.
        "px par ".$height."px de côtés.</br>";
    }

    public function drawSquare($origin, $color, $opacity, $width, $height)
    {
        return " On dessine un carré aux coordonnées ".$origin->x." et ".$origin->y.
        ", de couleur ".$color.", d'opacité : ".$opacity." et de ".$width.
        "px par ".$height."px de côtés.</br>";
    }

    public function getResult()
    {
        return implode("<br/>", $this->results);
    }


}