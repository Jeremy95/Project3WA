<?php
/**
 * Created by PhpStorm.
 * User: wap20
 * Date: 03/03/15
 * Time: 10:13
 */
class Square extends Rectangle
{
    protected $width;
    protected $height;

    public function __construct()
    {
        parent::__construct();
    }


    public function setSize($size, $unused=0)
    {
        $this->width= $size;
        $this->height = $size;
    }

    public function draw(Renderer $renderer)
    {
        return $renderer->drawSquare($this->location,
            $this->color,
            $this->opacity,
            $this->width,
            $this->height
        );
    }

//$origin, $color, $opacity, $size

}