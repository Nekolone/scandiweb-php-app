<?php
include_once "set_db.php";


function dbConnect()
{
    $host = 'localhost:3306';
    $db = 'shopdb';
    $user = 'admin';
    $pass = 'MdS4Dfu88JJn';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);
    return $pdo;
}




function add_type_0($SKU, $name, $price, $image_link, $item__type, $size)
{
    $mysqli = msl();
    $mysqli->query("SET NAMES 'utf8'");
    $mysqli->query("INSERT INTO `Product` (`SKU`, `name`, `addTime`, `price`, `imgLink`, `type`) VALUES ('$SKU', '$name', NULL, '$price','$image_link','$item__type')");
    $mysqli->query("INSERT INTO `TypeSize` (`SKU`, `size`) VALUES ('$SKU','$size')");
    $mysqli->close();


    //$pdo = dbConnect();
    //$pdo->query("INSERT INTO Product (SKU, name, addTime, price, imgLink, type) VALUES ('$SKU', '$name', .time()., '$price','$image_link','$item__type')");
    //$pdo->query("INSERT INTO TypeSize(SKU, size) VALUES ('$SKU','$size')");
}

function add_type_1($SKU, $name, $price, $image_link, $item__type, $height, $width, $length)
{

    $mysqli = msl();
    $mysqli->query("SET NAMES 'utf8'");
    $mysqli->query("INSERT INTO `Product` (`SKU`, `name`, `addTime`, `price`, `imgLink`, `type`) VALUES ('$SKU', '$name', NULL, '$price','$image_link','$item__type')");
    $mysqli->query("INSERT INTO `TypeHWL` (`SKU`, `height`, `width`, `length`) VALUES ('$SKU','$height','$width','$length')");
    $mysqli->close();
    //$pdo = dbConnect();
    //$pdo->query("INSERT INTO Product (SKU, name, addTime, price, imgLink, type) VALUES ('$SKU', '$name', .time()., '$price','$image_link','$item__type')");
    //$pdo->query("INSERT INTO TypeHWL(SKU, height, width, length) VALUES ('$SKU','$height','$width','$length')");
}

function add_type_2($SKU, $name, $price, $image_link, $item__type, $weight)
{

    $mysqli = msl();
    $mysqli->query("SET NAMES 'utf8'");
    $mysqli->query("INSERT INTO `Product` (`SKU`, `name`, `addTime`, `price`, `imgLink`, `type`) VALUES ('$SKU', '$name', NULL, '$price','$image_link','$item__type')");
    $mysqli->query("INSERT INTO `TypeWeight` (`SKU`, `weight`) VALUES ('$SKU','$weight')");
    $mysqli->close();
    //$pdo = dbConnect();
    //$pdo->query("INSERT INTO Product (SKU, name, addTime, price, imgLink, type) VALUES ('$SKU', '$name', .time()., '$price','$image_link','$item__type')");
    //$pdo->query("INSERT INTO TypeWeigth(sku, weight) VALUES ('$SKU','$weight')");
}

