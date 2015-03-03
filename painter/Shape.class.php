<?php
/**
 * Created by PhpStorm.
 * User: wap20
 * Date: 03/03/15
 * Time: 10:13
 */

abstract class Shape
{
    protected $location;
    protected $color;
    protected $opacity;

    public function __construct()
    {
        $this->color="black";
        $this->location= new Point();
        $this->opacity=1;

    }

    public function setColor($color)
    {
        $this->color= $color;
    }

    public function setOpacity($opacity)
    {
        $this->opacity= $opacity;
    }

    abstract public function draw(Renderer $renderer);

};