<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 23/02/15
 * Time: 14:46
 */

class User
{
    private $id;
    public $email;
    private $db;
    public $username;

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getUsername()
    {
        return $this->username;
    }



    public function __construct()
    {
        $this->db = new DatabaseHelper();
    }

    public function verifLogin($login, $pwd)
    {
        $res = $this->db->fetchOne("SELECT *
                                    FROM user
                                    WHERE email = :login", array(':login' => $login));
        if($res)
        {
            $this-> id = $res['id'];
            $this->email = $res['email'];
            $this->username = $res['username'];
            if(password_verify($pwd, $res['password']))
                return true;
            else
                return false;
        }
        else
        {
            return false;
        }
    }

    public function setUser($email, $pwd, $username)
    {
        $this->db->insertIntoDatabase('INSERT INTO user(email, password, username)
                       VALUES(:email, :pwd, :username)', array(':email' => $email, ':pwd' => $pwd, ':username' => $username));
    }
}