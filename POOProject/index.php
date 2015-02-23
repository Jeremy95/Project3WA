<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 23/02/15
 * Time: 11:08
 */
Class Vehicle
{
    public $passengers;
    public $wheels;

    public function __construct($_passengers, $_wheels)
    {
        $this->passengers = $_passengers;
        $this->wheels = $_wheels;
    }

    public function describe()
    {
        echo "Nombre de passagers : ".$this->passengers." , nombre de roues : ".$this->wheels."<br>";
    }
}


$car = new Vehicle(4, 5);
$car->describe();

$bus = new Vehicle(40, 6);
$bus->describe();

$bike = new Vehicle(1, 2);
$bike->describe();


Class Helper_Database
{
    private $path;


    public function __construct($_path)
    {
        $this->path = new PDO($_path);
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
}

$db = new Helper_Database("mysql:host=localhost;dbname=minichat", "root", "troiswa");
$messages = $db->fetchAll("SELECT *
                           FROM message
                           WHERE user >= :id", array(
    ':id' => 2
));

$message = $db->fetchOne("SELECT *
                           FROM message
                           WHERE user = :id", array(
    ':id' => 2
));

