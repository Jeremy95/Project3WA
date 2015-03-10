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
                JOIN img_product
                ON img_product.id_product = products.id_products
                JOIN images
                ON images.id_images = img_product.id_img
                WHERE products.id_products = ?";

        $query = $this->db->query($sql, array($id));
        $res = $query->row_array();

        return $res;
    }

    public function updateCommentProduct($idProduct)
    {
        $this->db->query("UPDATE products
                         SET id_comment_products = ?
                         WHERE id_products = ?", array($this->db->insert_id(), $idProduct));
    }

    public function addComment($comment, $idUser, $idProduct)
    {
        $sql = "INSERT INTO comments(content_comments, id_user_comments, id_product_comments)
                VALUES (?, ?, ?)";

        $this->db->query($sql, array($comment, $idUser, $idProduct));

        return $this->db->insert_id();
    }

    public function getCommentsByIdProduct($idProduct)
    {
        $sql = "SELECT *
                FROM comments
                JOIN users
                ON comments.id_user_comments = users.id_user
                WHERE comments.id_product_comments = ?";

        $query = $this->db->query($sql, array($idProduct));
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

    public function getProductBySearch($pattern)
    {
        $sql = "SELECT *, name_products as label
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