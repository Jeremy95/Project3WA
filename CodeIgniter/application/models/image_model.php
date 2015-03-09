<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Image_model extends CI_Model
{
    public function setImg($path)
    {
        $sql = "INSERT INTO images(url_images)
                        VALUES (?)";

        $this->db->query($sql, array($path));

        $idImg = $this->db->insert_id();

        if($idImg)
            return $idImg;
        else
            return false;
    }

    public function getAllImgByIdProduct($idProduct)
    {
        $sql = "SELECT *
                FROM images
                JOIN img_product
                ON images.id_images = img_product.id_img
                WHERE img_product.id_product = ?";

        $query = $this->db->query($sql, array($idProduct));
        $res = array();

        foreach($query->result_array() as $row)
        {
            $res[] = $row;
        }

        return $res;
    }

}