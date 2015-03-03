<?php
/**
 * Created by PhpStorm.
 * User: wap20
 * Date: 03/03/15
 * Time: 10:13
 */

class Rectangle extends Shape
{

    protected $width;
    protected $height;

    public function __construct()
    {
        parent::__construct();
        $this->height=0;
        $this->width=0;
    }

    public function setOrigin($x,$y)
    {
        $this->location->x = $x;
        $this->location->y = $y ;
    }

    public function setSize($width, $height)
    {
        $this->height = $height;
        $this->width = $width;
    }

    public function draw(Renderer $renderer)
    {
        return $renderer->drawRectangle($this->location,
            $this->color,
            $this->opacity,
            $this->width,
            $this->height
        );
    }

//$origin, $color, $opacity, $width, $height

}