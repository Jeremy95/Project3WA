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

    public function getProductById($id)
    {
        $sql = "SELECT *
                FROM products
                WHERE id_products = ?";

        $query = $this->db->query($sql, array($id));
        $res = $query->row_array();

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

    public function getProductBySearch($pattern)
    {
        $sql = "SELECT *
                FROM products
                JOIN img_product
                ON img_product.id_product = products.id_products
                JOIN images
                ON images.id_images = img_product.id_img
                WHERE name_products LIKE ?
                LIMIT 100";

        $query = $this->db->query($sql, $pattern."%");

        $res = array();

        foreach($query->result_array() as $row)
        {
            $res[] = $row;
        }

        return $res;
    }
}