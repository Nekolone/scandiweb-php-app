<?php


class InformationProvider
{
    public $SKU;
    public $name;
    public $price;
    public $image_link;
    public $item__type;
    public $size;
    public $height;
    public $width;
    public $length;
    public $weight;

    function __construct($SKU, $name, $price, $image_link, $item__type, $size, $height, $width, $length, $weight)
    {
        $this->SKU = $SKU;
        $this->name = $name;
        $this->price = $price;
        $this->image_link = $image_link;
        $this->item__type = $item__type;

        switch ($item__type) {
            case "0":
                $this->size = $size;
                break;
            case "1":
                $this->height = $height;
                $this->width = $width;
                $this->length = $length;
                break;
            case "2":
                $this->weight = $weight;
                break;
        }

    }

    public function dbConnect()
    {
        $host = 'localhost:8085';
        $db = 'shopdb';
        $user = 'admin';
        $pass = 'yf9K7ItvSRlC';
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);
    }

    public function add_type_0($SKU, $name, $price, $image_link, $item__type, $size)
    {
        dbConnect();
    }

    public function add_type_1($SKU, $name, $price, $image_link, $item__type, $height, $width, $length)
    {

    }

    public function add_type_2($SKU, $name, $price, $image_link, $item__type, $weight)
    {

    }


}