<?php

/**
 * Class DimensionalProduct
 *
 * work with "dimensional" product type
 *
 * работает с продуктом типа "dimensional"
 *
 */


class DimensionalProduct extends Product
{

    public $height;
    public $width;
    public $length;


    public static function buildProduct($SKU, $name, $price, $image__link, $item__type, $height, $width, $length)
    {
        $product = new DimensionalProduct();
        Product::initializeProduct($product, $SKU, $name, $price, $image__link, $item__type);
        $product->height = $height;
        $product->width = $width;
        $product->length = $length;
        return $product;
    }

    public static function fromDB($SKU)
    {
        $row = DataAccessService::getDataAccessor()->getSingleResultFromQuery("SELECT * FROM `Product`
    JOIN TypeHWL on Product.SKU = TypeHWL.SKU WHERE Product.SKU='$SKU'");
        $product = new DimensionalProduct();
        Product::initializeProduct(
            $product,
            $row["SKU"],
            $row["name"],
            $row["price"],
            $row["image__link"],
            $row["item__type"]
        );
        $product->height = $row["height"];
        $product->width = $row["width"];
        $product->length = $row["length"];
        $product->addTime = $row["addTime"];
        return $product;
    }

    public function outputInfo()
    {
        echo "<div class=\"info__box\">";
        echo "<a href=\"item_info.php?SKU=" . $this->SKU . "&name=" . $this->name . "\"><img src=\""
            . $this->image__link . "\" alt=\"pic\"></a>";
        echo "<div><table><tbody><tr><td><span>Name:</span></td><td><span>" . $this->name . "</span></td>";
        echo "</tr><tr><td><span>Price:</span></td><td><span>" . $this->price . " €</span></td>";
        echo "</tr><tr><td><span>HxWxL:</span></td><td><span>" . $this->height . "x" . $this->width . "x"
            . $this->length . " mm</span></td>";
        echo "</tr><tr><td><span>SKU:</span></td><td><span>" . $this->SKU . "</span></td>";
        echo "</tr></tbody></table></div></div>";
    }

    public function outputItem()
    {
        echo "<div class=\"content-info__box\"><div class=\"item__image\"><img src=\""
            . $this->image__link . "\" alt=\"pic\"></div>";
        echo "<div><table><tbody><tr><td><span>Name:</span></td><td><span>" . $this->name . "</span></td>";
        echo "</tr><tr><td><span>Price:</span></td><td><span>" . $this->price . " EUR</span></td>";
        echo "</tr><tr><td><span>HxWxL:</span></td><td><span>" . $this->height . "x" . $this->width . "x"
            . $this->length . " mm</span></td>";
        echo "</tr><tr><td><span>SKU:</span></td><td><span>" . $this->SKU . "</span></td>";
        echo "</tr><tr><td><span>AddTime:</span></td><td><span>" . $this->addTime . "</span></td>";
        echo "</tr></tbody></table></div></div>";
    }

    public function isValid()
    {
        if (!parent::isValid()) {
            return false;
        }
        $var1 = isset($this->height) ? filter_var($this->height, FILTER_VALIDATE_INT) : false;
        $var2 = isset($this->width) ? filter_var($this->width, FILTER_VALIDATE_INT) : false;
        $var3 = isset($this->length) ? filter_var($this->length, FILTER_VALIDATE_INT) : false;

        if (($var1 == true) and ($var2 == true) and ($var3 == true))
            return true;
        else
            return false;
    }

    public function persistToDB()
    {
        DataAccessService::getDataAccessor()->executeQuery("INSERT INTO `Product` (`SKU`, `name`, `price`,
                       `image__link`, `item__type`) VALUES ('$this->SKU', '$this->name', '$this->price',
                                                            '$this->image__link','$this->item__type')");
        DataAccessService::getDataAccessor()->executeQuery("INSERT INTO `TypeHWL` (`SKU`, `height`, `width`,
                       `length`) VALUES ('$this->SKU','$this->height','$this->width','$this->length')");
    }

}
