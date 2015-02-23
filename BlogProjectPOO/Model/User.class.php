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


    public function __construct()
    {
        $this->db = new DatabaseHelper();
    }

    public function verifLogin($login, $pwd)
    {
        $res = $this->db->fetchOne("SELECT *
                                    FROM user
                                    WHERE email = $login");
        if($res)
        {
            $user = new User();
            $user->id = $res['id'];
            $user->email = $res['email'];
            if(password_verify($pwd, $res['password']))
                return $user;
            else
                return false;
        }
        else
        {
            return false;
        }
    }

    public function addUser($email, $pwd)
    {
        $res = $this->db->insertIntoDatabase("INSERT INTO user (email, password)
                                       VALUES ($email, $pwd)");

        if($res)
            echo "ok";
    }
}