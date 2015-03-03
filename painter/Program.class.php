<?php
/**
 * Created by PhpStorm.
 * User: wap20
 * Date: 03/03/15
 * Time: 09:58
 */

class Program
{
    public function run(Renderer $renderer)
    {
        $rectangle = new Rectangle();
        $rectangle->setOrigin(50,50);
        $rectangle->setSize(200,300);
        $rectangle->setColor("blue");
        $rectangle->setOpacity(0.8);
        $renderer->addShape($rectangle);

        $square = new Square();
        $square->setOrigin(10,10);
        $square->setSize(300);
        $square->setColor("green");
        $square->setOpacity(0.6);
        $renderer->addShape($square);


        $ellipse = new Ellipse();
        $ellipse->setCenter(200,300);
        $ellipse->setRadius(60, 180);
        $ellipse->setOpacity(0.9);
        $ellipse->setColor("purple");
        $renderer->addShape($ellipse);


        $circle = new Circle();
        $circle->setCenter(118,104);
        $circle->setRadius(90);
        $circle->setOpacity(1);
        $circle->setColor("red");
        $renderer->addShape($circle);

        $renderer->run();

    }



};