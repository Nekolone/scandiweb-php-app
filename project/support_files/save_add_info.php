<?php


$image_link = "";
$SKU = "";
$name = "";
$price = "";
$item__type = "0";

$size = "";

$height = "";
$width = "";
$length = "";

$weight = "";


if (isset($_POST["done"])) {
    if (isset($_POST["image_link"])) $image_link = htmlspecialchars($_POST["image_link"]);
    if (isset($_POST["SKU"])) $SKU = htmlspecialchars($_POST["SKU"]);
    if (isset($_POST["name"])) $name = htmlspecialchars($_POST["name"]);
    if (isset($_POST["price"])) $price = htmlspecialchars($_POST["price"]);
    if (isset($_POST["item__type"])) $item__type = htmlspecialchars($_POST["item__type"]);

    if (isset($_POST["size"])) $size = htmlspecialchars($_POST["size"]);

    if (isset($_POST["height"])) $height = htmlspecialchars($_POST["height"]);
    if (isset($_POST["width"])) $width = htmlspecialchars($_POST["width"]);
    if (isset($_POST["length"])) $length = htmlspecialchars($_POST["length"]);

    if (isset($_POST["weight"])) $weight = htmlspecialchars($_POST["weight"]);


    //это все в класс проверки потом запихать, который будет возвращать значение в adderror в зависимости от ошибки
    switch ($item__type) {
        case "0":
            if ($image_link == "" or $SKU == "" or $name == "" or $price == "" or $item__type == "" or $size == "")
                $adderror = 1;
            else add_type_0($image_link, $SKU, $name, $price, $item__type, $size);
            break;
        case "1":
            if ($image_link == "" or $SKU == "" or $name == "" or $price == "" or $item__type == "" or $height == "" or $width == "" or $length == "")
                $adderror = 1;
            else add_type_1($image_link, $SKU, $name, $price, $item__type, $height, $width, $length);
            break;
        case "2":
            if ($image_link == "" or $SKU == "" or $name == "" or $price == "" or $item__type == "" or $weight == "")
                $adderror = 1;
            else add_type_2($image_link, $SKU, $name, $price, $item__type, $weight);
            break;
    }

}