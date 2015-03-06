<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    public function getUsers()
    {
        $sql = "SELECT * FROM users";

        $query = $this->db->query($sql);
        $res = array();

        foreach($query->result_array() as $row)
        {
            $res[] = $row;
        }

        return $res;
    }

    public function createUser($name, $email, $password)
    {
        $sql = "SELECT name_user FROM users
                WHERE name_user  = ?";
        $query = $this->db->query($sql, array($name));

        $sql2 = "SELECT email_user FROM users
                WHERE email_user  = ?";

        $query2 = $this->db->query($sql2, array($email));

        if($query->num_rows() > 0)
        {
            return $message = "username already taken choose another";
        }
        elseif($query2->num_rows() > 0)
        {
            return $message = "email already taken choose another";
        }
        else
        {
            $sql = "INSERT INTO users(name_user, email_user, password_user)
                VALUES (?, ?, ?)";

            $this->db->query($sql, array($name, $email, password_hash($password, PASSWORD_DEFAULT)));

            return $this->db->insert_id();
        }
    }

    public function userConnection($name, $password)
    {
        $sql = "SELECT name_user, password_user
                FROM users
                WHERE name_user = ?";

        $query = $this->db->query($sql, array($name));


        if($query->num_rows() > 0)
        {
            $user = $query->row_array();

            if(password_verify($password, $user["password_user"]))
            {
                return true;
            }

            return false;
        }

        else
            return false;

    }

}