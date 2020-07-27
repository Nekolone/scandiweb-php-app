<?php
include_once "DataAccessService.php";

abstract class Product
{
    public $SKU;
    public $name;
    public $price;
    public $image__link;
    public $item__type;

    public static function initializeProduct($product, $SKU, $name, $price, $image__link, $item__type)
    {
        $product->SKU = $SKU;
        $product->name = $name;
        $product->price = $price;
        $product->image__link = $image__link;
        $product->item__type = $item__type;
    }

    /**
     * Метод проверяет если все поля валидны.
     * Возврашает true если всё валидно.
     * False если не всё валидно
     * @return bool|void
     */
    public function isValid()
    {
        //выполняем проверки на поля sku,name,price,link,item_type
        return true;
    }

    abstract public function outputInfo();

    abstract public function persistToDB();

}


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
        $row = DataAccessService::getDataAccessor()->getSingleResultFromQuery("SELECT * FROM `Product` JOIN TypeSize  on Product.SKU = TypeSize.SKU WHERE Product.SKU='$SKU'");
        $product = new SizeProduct();
        Product::initializeProduct($product, $row["SKU"], $row["name"], $row["price"], $row["image__link"], $row["item__type"]);
        $product->size = $row["size"];
        return $product;
    }

    public function outputInfo()
    {
        echo "<div class=\"info__box\">";
        echo "<a href=\"#\"><img src=\"" . $this->image__link . "\" alt=\"pic\"></a>";
        echo "<div><table><tbody><tr><td><span>Name:</span></td><td><span>" . $this->name . "</span></td>";
        echo "</tr><tr><td><span>Price:</span></td><td><span>" . $this->price . "</span></td>";
        echo "</tr><tr><td><span>Attribute:</span></td><td><span>size=" . $this->size . "</span></td>";
        echo "</tr><tr><td><span>SKU:</span></td><td><span>" . $this->SKU . "</span></td>";
        echo "</tr></tbody></table></div></div>";
    }

    public function isValid()
    {
        if (!parent::isValid()) {
            return false;
        }
        //выполнем проверку на size если надо
        return true;
    }

    public function persistToDB()
    {
        DataAccessService::getDataAccessor()->executeQuery("INSERT INTO `Product` (`SKU`, `name`, `addTime`, `price`, `image__link`, `item__type`) VALUES ('$this->SKU', '$this->name', NULL, '$this->price','$this->image__link','$this->item__type')");
        DataAccessService::getDataAccessor()->executeQuery("INSERT INTO `TypeSize` (`SKU`, `size`) VALUES ('$this->SKU','$this->size')");
    }
}

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
        $row = DataAccessService::getDataAccessor()->getSingleResultFromQuery("SELECT * FROM `Product` JOIN TypeHWL on Product.SKU = TypeHWL.SKU WHERE Product.SKU='$SKU'");
        $product = new DimensionalProduct();
        Product::initializeProduct($product, $row["SKU"], $row["name"], $row["price"], $row["image__link"], $row["item__type"]);
        $product->height = $row["height"];
        $product->width = $row["width"];
        $product->legth = $row["length"];
        return $product;
    }

    public function outputInfo()
    {
        echo "<div class=\"info__box\">";
        echo "<a href=\"#\"><img src=\"" . $this->image__link . "\" alt=\"pic\"></a>";
        echo "<div><table><tbody><tr><td><span>Name:</span></td><td><span>" . $this->name . "</span></td>";
        echo "</tr><tr><td><span>Price:</span></td><td><span>" . $this->price . "</span></td>";
        echo "</tr><tr><td><span>Attribute:</span></td><td><span>HxWxL=" . $this->height . "x" . $this->width . "x" . $this->length . "</span></td>";
        echo "</tr><tr><td><span>SKU:</span></td><td><span>" . $this->SKU . "</span></td>";
        echo "</tr></tbody></table></div></div>";
    }

    public function isValid()
    {
        if (!parent::isValid()) {
            return false;
        }
        //выполнем проверку на height, width, length если надо
        return true;
    }

    public function persistToDB()
    {
        DataAccessService::getDataAccessor()->executeQuery("INSERT INTO `Product` (`SKU`, `name`, `addTime`, `price`, `image__link`, `item__type`) VALUES ('$this->SKU', '$this->name', NULL, '$this->price','$this->image__link','$this->item__type')");
        DataAccessService::getDataAccessor()->executeQuery("INSERT INTO `TypeHWL` (`SKU`, `height`, `width`, `length`) VALUES ('$this->SKU','$this->height','$this->width','$this->length')");
    }
}

class WeightProduct extends Product
{
    public $weight;

    public static function buildProduct($SKU, $name, $price, $image__link, $item__type, $weight)
    {
        $product = new WeightProduct();
        Product::initializeProduct($product, $SKU, $name, $price, $image__link, $item__type);
        $product->weight = $weight;
        return $product;
    }

    public static function fromDB($SKU)
    {
        $row = DataAccessService::getDataAccessor()->getSingleResultFromQuery("SELECT * FROM `Product` JOIN TypeWeight  on Product.SKU = TypeWeight.SKU WHERE Product.SKU='$SKU'");
        $product = new WeightProduct();
        Product::initializeProduct($product, $row["SKU"], $row["name"], $row["price"], $row["image__link"], $row["item__type"],);
        $product->weight = $row["weight"];
        return $product;
    }

    public function outputInfo()
    {
        echo "<div class=\"info__box\">";
        echo "<a href=\"#\"><img src=\"" . $this->image__link . "\" alt=\"pic\"></a>";
        echo "<div><table><tbody><tr><td><span>Name:</span></td><td><span>" . $this->name . "</span></td>";
        echo "</tr><tr><td><span>Price:</span></td><td><span>" . $this->price . "</span></td>";
        echo "</tr><tr><td><span>Attribute:</span></td><td><span>weight=" . $this->weight . "</span></td>";
        echo "</tr><tr><td><span>SKU:</span></td><td><span>" . $this->SKU . "</span></td>";
        echo "</tr></tbody></table></div></div>";
    }

    public function isValid()
    {
        if (!parent::isValid()) {
            return false;
        }
        //выполнем проверку на weight если надо
        return true;
    }

    public function persistToDB()
    {
        DataAccessService::getDataAccessor()->executeQuery("INSERT INTO `Product` (`SKU`, `name`, `addTime`, `price`, `image__link`, `item__type`) VALUES ('$this->SKU', '$this->name', NULL, '$this->price','$this->image__link','$this->item__type')");
        DataAccessService::getDataAccessor()->executeQuery("INSERT INTO `TypeWeight` (`SKU`, `weight`) VALUES ('$this->SKU','$this->weight')");
    }
}
