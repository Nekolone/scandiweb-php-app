<?php
/**
 * Connecting require files
 *
 * Подключение необходимых фалов
 *
 */
include_once "classes/AddProduct.php";
include_once "classes/OutputInfoService.php";
include_once "classes/InfoSavingService.php";
include_once "classes/product/Product.php";
include_once "classes/product/SizeProduct.php";
include_once "classes/product/DimensionalProduct.php";
include_once "classes/product/WeightProduct.php";
include_once "classes/SKUValidator.php";
include_once "classes/SKUGenerator.php";
include_once "classes/DataAccessService.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,
    300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../resources/css/main.css">
    <script src="https://kit.fontawesome.com/3b00340691.js" crossorigin="anonymous"></script>
    <script src="../resources/js/jquery-3.5.1.min.js"></script>
    <script src="../resources/js/main.js"></script>
    <title><?= $title ?></title>
</head>

<body>
<header class="header">
    <div class="container">
        <div class="content__box">
            <div class="logo">
                <a href="main.php"><em class="fas fa-arrow-left"></em></a>
                <a><?= $title ?></a>
            </div>
