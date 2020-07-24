<?php


class DataAccessService
{
    private $mysqli;
    private static $instance = null;

    public function getSingleRow($query)
    {
        $getRow = $this->mysqli->query($query);
        return mysqli_fetch_assoc($getRow);
    }

    public static function getDataAccessor()
    {
        if (self::$instance == null) {
            self::$instance = new DataAccessService();
        }
        return self::$instance;
    }

    public function __construct()
    {
        $this->mysqli = new mysqli('localhost:3306', 'root', '', 'shopdb');
        $this->mysqli->query("SET NAMES 'utf8'");
    }

    function __destruct()
    {
        $this->mysqli->close();
    }


}