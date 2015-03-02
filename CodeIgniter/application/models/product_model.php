<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model {

    function getAll()
    {
        return array("shoes", "shirt", "pantalon");
    }
}