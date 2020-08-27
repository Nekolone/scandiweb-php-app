<?php

/**
 * Class AddProduct
 *
 * create product, validate and persist to database
 *
 * создает продует, проверяет его и сохраняет в базе данных
 *
 */


class AddProduct
{

    public static function addCheck(
        $SKU,
        $name,
        $price,
        $image__link,
        $item__type,
        $size,
        $height,
        $width,
        $length,
        $weight
    )
    {
        $product = self::createProduct(
            $SKU,
            $name,
            $price,
            $image__link,
            $item__type,
            $size,
            $height,
            $width,
            $length,
            $weight
        );
        if ($product->isValid()) {
            $product->persistToDB();
            header("Location:main.php");
        }
        return 1;
    }

    public static function createProduct(
        $SKU,
        $name,
        $price,
        $image__link,
        $item__type,
        $size,
        $height,
        $width,
        $length,
        $weight
    )
    {
        switch ($item__type) {
            case 0:
                return SizeProduct::buildProduct($SKU, $name, $price, $image__link, $item__type, $size);
            case 1:
                return DimensionalProduct::buildProduct(
                    $SKU,
                    $name,
                    $price,
                    $image__link,
                    $item__type,
                    $height,
                    $width,
                    $length
                );
            case 2:
                return WeightProduct::buildProduct($SKU, $name, $price, $image__link, $item__type, $weight);
            default:
                throw new InvalidArgumentException("Item type is unknown:$item__type");
        }
    }

}
