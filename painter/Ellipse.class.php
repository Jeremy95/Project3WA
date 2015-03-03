<?php
/**
 * Created by PhpStorm.
 * User: wap20
 * Date: 03/03/15
 * Time: 10:14
 */

class Ellipse extends Shape
{
    protected $height;
    protected $width;

    public function __construct()
    {
        parent::__construct();
    }

    public function setCenter($xRadius, $yRadius)
    {
        $this->location->x = $xRadius;
        $this->location->y = $yRadius;
    }

    public function setRadius($xRadius, $yRadius)
    {
        $this->height= $xRadius;
        $this->width = $yRadius;
    }

    public function draw(Renderer $renderer)
    {
        return $renderer->drawEllipse($this->location,
            $this->color,
            $this->opacity,
            $this->height,
            $this->width
        );
    }
//$origin, $color, $opacity, $xRadius, $yRadius)


}