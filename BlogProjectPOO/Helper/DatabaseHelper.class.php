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
        $res = $query->fetchAll();

        return $res;
    }

    public function fetchOne($query, $data = array())
    {
        $query = $this->path->prepare($query);
        $query->execute($data);
        $res = $query->fetch();

        return $res;
    }

    public function getLastInsertId($queryString)
    {
        $query = $this->path->prepare($queryString);
        $query->execute();
        $lastId = $this->path->lastInsertId();

        return $lastId;
    }

    public function insertIntoDatabase($query)
    {
        try
        {
            $query = $this->path->prepare($query);
            $query->execute();
        }
        catch (Exception $e)
        {
            echo "L'insertion a échoué : ", $e->getMessage(), "\n";
        }
    }
}