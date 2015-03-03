<?php
/**
 * Created by PhpStorm.
 * User: wap20
 * Date: 03/03/15
 * Time: 12:07
 */

abstract class renderer
{
    abstract public function drawCircle($origin, $color, $opacity, $radius);
    abstract public function drawEllipse($origin, $color, $opacity, $xRadius, $yRadius);
    abstract public function drawRectangle($origin, $color, $opacity, $width, $height);
    abstract public function drawSquare($origin, $color, $opacity, $width, $height);

    protected $shapes;
    protected $results;

    public function __construct()
    {
        $this->shapes = array();
        $this->results = array();
    }

    public function addShape($shape)
    {
        array_push($this->shapes, $shape);
    }

    public function run()
    {
        foreach ($this->shapes as $shape)
        {
            $result = $shape->draw($this);
            array_push($this->results, $result);
        }
    }

    abstract public function getResult();


}




