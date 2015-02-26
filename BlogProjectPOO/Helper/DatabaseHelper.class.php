<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 23/02/15
 * Time: 14:39
 */

class DatabaseHelper
{
    private $path;


    public function __construct()
    {
        $this->path = new PDO("mysql:host=localhost; dbname=blog", "root", "troiswa");
        $this->path->exec("SET NAMES UTF8");
        $this->path->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function fetchAll($query, $data = array())
    {
        $query = $this->path->prepare($query);
        $query->execute($data);
        $res = $query->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public function fetchOne($query, $data = array())
    {
        $query = $this->path->prepare($query);
        $query->execute($data);
        $res = $query->fetch(PDO::FETCH_ASSOC);

        return $res;
    }


    public function insertIntoDatabase($query, $data)
    {
        try
        {
            $query = $this->path->prepare($query);
            $query->execute($data);
            return $this->path->lastInsertId();
        }
        catch (Exception $e)
        {
            echo "L'insertion a échoué : ".$e->getMessage()."\n";
            return false;
        }
    }
}