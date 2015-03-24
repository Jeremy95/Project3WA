<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bookmarks_model extends CI_Model
{
    public function getBookmarks()
    {
        $sql = "SELECT bookmarks.*, categories.name as category
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

    public function createBookmarks($title, $url, $idCategory)
    {
        $sql = "INSERT INTO bookmarks(title, url, id_category)
                VALUES (?, ?, ?)";

        $this->db->query($sql, array($title, $url, $idCategory));

        return $this->db->insert_id();
    }

    public function updateBookmarks($idBookmarks, $title, $url)
    {
        $sql = "UPDATE bookmarks
                SET title = ?,
                url = ?
                WHERE id = ?";

        $this->db->query($sql, array($title, $url, $idBookmarks));

    }

    public function removeBookmarks($idBookmarks)
    {
        $sql = "DELETE FROM bookmarks
                WHERE id = ?";

        $this->db->query($sql, array($idBookmarks));
    }

    public function getBookmarkById($idBookmark)
    {
        $sql = "SELECT bookmarks.*, categories.name as category
                FROM bookmarks
                JOIN categories
                ON categories.id = bookmarks.id_category
                WHERE bookmarks.id = ?";

        $query = $this->db->query($sql, array($idBookmark));
        $res = $query->row_array();

        return $res;
    }
}