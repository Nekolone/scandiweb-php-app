<?php

/**
 * Class SizeProduct
 *
 * work with "size" product type
 *
 * работает с продуктом типа "size"
 *
 */


class SizeProduct extends Product
{

    public $size;

    public static function buildProduct($SKU, $name, $price, $image__link, $item__type, $size)
    {
        $product = new SizeProduct();
        Product::initializeProduct($product, $SKU, $name, $price, $image__link, $item__type);
        $product->size = $size;
        return $product;
    }

    public static function fromDB($SKU)
    {
        $row = DataAccessService::getDataAccessor()->getSingleResultFromQuery("SELECT * FROM `Product` JOIN
    TypeSize on Product.SKU = TypeSize.SKU WHERE Product.SKU='$SKU'");
        $product = new SizeProduct();
        Product::initializeProduct(
            $product,
            $row["SKU"],
            $row["name"],
            $row["price"],
            $row["image__link"],
            $row["item__type"]
        );
        $product->size = $row["size"];
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
        echo "</tr><tr><td><span>Size:</span></td><td><span>" . $this->size . "</span></td>";
        echo "</tr><tr><td><span>SKU:</span></td><td><span>" . $this->SKU . "</span></td>";
        echo "</tr></tbody></table></div></div>";
    }

    public function outputItem()
    {
        echo "<div class=\"content-info__box\"><div class=\"item__image\"><img src=\""
            . $this->image__link . "\" alt=\"pic\"></div>";
        echo "<div><table><tbody><tr><td><span>Name:</span></td><td><span>" . $this->name . "</span></td>";
        echo "</tr><tr><td><span>Price:</span></td><td><span>" . $this->price . " EUR</span></td>";
        echo "</tr><tr><td><span>Size:</span></td><td><span>" . $this->size . "</span></td>";
        echo "</tr><tr><td><span>SKU:</span></td><td><span>" . $this->SKU . "</span></td>";
        echo "</tr><tr><td><span>AddTime:</span></td><td><span>" . $this->addTime . "</span></td>";
        echo "</tr></tbody></table></div></div>";
    }

    public function isValid()
    {
        if (!parent::isValid()) {
            return false;
        }
        $var1 = isset($this->size) ? $this->size != "" : false;
        return ($var1 == true) ? true : false;
        //if ($var1 == true)
        //    return true;
        //else
        //    return false;
    }

    public function persistToDB()
    {
        DataAccessService::getDataAccessor()->executeQuery("INSERT INTO `Product` (`SKU`, `name`, `price`,
                       `image__link`, `item__type`) VALUES ('$this->SKU', '$this->name', '$this->price',
                                                            '$this->image__link','$this->item__type')");
        DataAccessService::getDataAccessor()->executeQuery("INSERT INTO `TypeSize` (`SKU`,
                        `size`) VALUES ('$this->SKU','$this->size')");
    }

}
