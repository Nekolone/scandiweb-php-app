<?php


$SKU = "";
$name = "";
$price = "";
$image__link = "";
$item__type = "0";

$size = "";

$height = "";
$width = "";
$length = "";

$weight = "";


if (isset($_POST["done"])) {
    if (isset($_POST["image__link"])) $image__link = htmlspecialchars($_POST["image__link"]);
    if (isset($_POST["SKU"])) $SKU = htmlspecialchars($_POST["SKU"]);
    if (isset($_POST["name"])) $name = htmlspecialchars($_POST["name"]);
    if (isset($_POST["price"])) $price = htmlspecialchars($_POST["price"]);
    if (isset($_POST["item__type"])) $item__type = htmlspecialchars($_POST["item__type"]);

    if (isset($_POST["size"])) $size = htmlspecialchars($_POST["size"]);

    if (isset($_POST["height"])) $height = htmlspecialchars($_POST["height"]);
    if (isset($_POST["width"])) $width = htmlspecialchars($_POST["width"]);
    if (isset($_POST["length"])) $length = htmlspecialchars($_POST["length"]);

    if (isset($_POST["weight"])) $weight = htmlspecialchars($_POST["weight"]);


    $adderror=add_check($SKU, $name, $price, $image__link, $item__type, $size, $height, $width, $length, $weight);

}