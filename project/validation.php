<?php
//include_once "support_files/set_db.php";
include_once "support_files/DataAccessService.php";
include_once "support_files/InformationProvider.php";


function addСheck($SKU, $name, $price, $image__link, $item__type, $size, $height, $width, $length, $weight)
{
    $product = createProduct($SKU, $name, $price, $image__link, $item__type, $size, $height, $width, $length, $weight);
    if ($product->isValid()) {
        $product->persistToDB();
        header("Location:main.php");
    }
    return 1;
}

function createProduct($SKU, $name, $price, $image__link, $item__type, $size, $height, $width, $length, $weight)
{
    switch ($item__type) {
        case 0:
            return SizeProduct::buildProduct($SKU, $name, $price, $image__link, $item__type, $size);
        case 1:
            return DimensionalProduct::buildProduct($SKU, $name, $price, $image__link, $item__type, $height, $width,
                $length);
        case 2:
            return WeightProduct::buildProduct($SKU, $name, $price, $image__link, $item__type, $weight);
        default:
            throw new InvalidArgumentException("Item type is unknown:$item__type");
    }
}


