<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories_model extends CI_Model
{
    public function getCategories()
    {
        $sql = "SELECT *
                FROM categories";

        $query = $this->db->query($sql);
        $res = array();

        foreach ($query->result_array() as $row) {
            $res[] = $row;
        }

        return $res;
    }
}