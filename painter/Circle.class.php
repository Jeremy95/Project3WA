<?php
/**
 * Created by PhpStorm.
 * User: wap20
 * Date: 03/03/15
 * Time: 10:14
 */

class Circle extends Ellipse
{
    protected $radius;


    public function __construct()
    {
        parent::__construct();
    }

    public function setRadius($radius, $unused=0)
    {
        $this->radius= $radius;
    }

    public function draw(Renderer $renderer)
    {
        return $renderer->drawCircle($this->location,
            $this->color,
            $this->opacity,
            $this->radius);
    }
//($origin, $color, $opacity, $radius)

}