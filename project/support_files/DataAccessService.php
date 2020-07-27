<?php


class DataAccessService
{
    private $mysqli;
    private static $instance = null;

    public function getSingleResultFromQuery($query)
    {
        $getRow = $this->mysqli->query($query);
        if ($getRow->num_rows > 1) {
            throw new LengthException("More than one row returned for query:$query");
        }
        return mysqli_fetch_assoc($getRow);
    }

    public function getQueryResults($query)
    {
        return $this->mysqli->query($query);
    }


    public static function getDataAccessor()
    {
        if (self::$instance == null) {
            self::$instance = new DataAccessService();
        }
        return self::$instance;
    }

    private function __construct()
    {
        $this->mysqli = new mysqli('localhost:3306', 'root', '', 'shopdb');
        $this->mysqli->query("SET NAMES 'utf8'");
    }

    function __destruct()
    {
        $this->mysqli->close();
    }


}