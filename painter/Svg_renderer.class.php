<?php
/**
 * Created by PhpStorm.
 * User: wap20
 * Date: 03/03/15
 * Time: 12:09
 */
//
class Svg_renderer extends Renderer

{
    public function drawCircle($origin, $color, $opacity, $radius)
    {
        return '<circle cx="'.$origin->x.'"
        cy="'.$origin->y.'"
        r="'.$radius.'"
        fill="'.$color.'"
        opacity="'.$opacity.'"/>';
    }

    public function drawEllipse($origin, $color, $opacity, $xRadius, $yRadius)
    {
        return '<ellipse cx="'.$origin->x.'"
        cy="'.$origin->y.'"
        rx="'.$xRadius.'"
        ry="'.$yRadius.'"
        fill="'.$color.'"
        opacity="'.$opacity.'"/>';
    }

    public function drawRectangle($origin, $color, $opacity, $width, $height)
    {
        return '<rect x="'.$origin->x.'"
        y="'.$origin->y.'"
        width="'.$width.'"
        height="'.$height.'"
        fill="'.$color.'"
        opacity="'.$opacity.'"/>';
    }

    public function drawSquare($origin, $color, $opacity, $width, $height)
    {
        return '<rect x="'.$origin->x.'"
        y="'.$origin->y.'"
        width="'.$width.'"
        height="'.$height.'"
        fill="'.$color.'"
        opacity="'.$opacity.'"/>';
    }

    public function getResult()
    {
        $result = "<svg height='500px' width='500px'>";
        $result .= implode(" ", $this->results);
        $result .= "</svg>";
        return $result;


    }


}

