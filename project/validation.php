<?php
include_once "support_files/set_db.php";


function add_check($SKU, $name, $price, $image__link, $item__type, $size, $height, $width, $length, $weight)
{
    $mysqli = msl();
    $mysqli->query("SET NAMES 'utf8'");
    $skucheck = $mysqli->query("SELECT * FROM `Product` WHERE SKU='$SKU'");
    $row = mysqli_fetch_assoc($skucheck);
    $mysqli->close();
    if ($row["SKU"] == false)
        if ($SKU != "" or strlen($SKU) < 8 or $name != "" or $price != "" or $image__link != "" or $item__type != "")
            switch ($item__type) {
                case "0":
                    if ($size == "")
                        return 1;
                    else {
                        add_type_0($SKU, $name, $price, $image__link, $item__type, $size);
                    }
                    break;
                case "1":
                    if ($height == "" or $width == "" or $length == "")
                        return 1;
                    else {
                        add_type_1($SKU, $name, $price, $image__link, $item__type, $height, $width, $length);
                    }
                    break;
                case "2":
                    if ($weight == "")

                        return 1;
                    else {
                        add_type_2($SKU, $name, $price, $image__link, $item__type, $weight);
                    }
                    break;
            }
        else
            return 1;
    else
        return 1;
}

