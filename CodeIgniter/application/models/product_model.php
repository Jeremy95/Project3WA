<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public function getAllProduct()
    {
        $sql = "SELECT *
                FROM products";

        $query = $this->db->query($sql);
        $res = array();

        foreach($query->result_array() as $row)
        {
            $res[] = $row;
        }

        return $res;
    }

    public function setProduct($productName, $productDescription, $productPrice)
    {
        $sql = "INSERT INTO products(name_products, description_products, prix_products)
                VALUES (?, ?, ?)";

        $this->db->query($sql, array($productName, $productDescription, $productPrice));

        $id = $this->db->insert_id();

        if($id)
            return $id;
        else
            return false;
    }

    public function setImgForProduct($idImg, $idProduct)
    {
        $sql = "INSERT INTO img_product (id_img, id_product)
                                       VALUES (?, ?)";

        $this->db->query($sql, array($idImg, $idProduct));
    }
}