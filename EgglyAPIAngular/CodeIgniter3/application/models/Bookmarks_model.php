<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bookmarks_model extends CI_Model
{
    public function getBookmarks()
    {
        $sql = "SELECT *
                FROM bookmarks
                JOIN categories
                ON categories.id = bookmarks.id_category";

        $query = $this->db->query($sql);
        $res = array();

        foreach ($query->result_array() as $row) {
            $res[] = $row;
        }

        return $res;
    }
}