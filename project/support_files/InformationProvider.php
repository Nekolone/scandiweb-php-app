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


    public function isValid()
    {
        $var1 = isset($this->SKU) ? strlen($this->SKU) == 8 : false;
        $var2 = isset($this->name) ? $this->name != "" : false;
        $var3 = isset($this->price) ? $this->price != "" : false;
        $var4 = isset($this->image__link) ? filter_var($this->image__link, FILTER_VALIDATE_URL) : false;
        $arr = array("0", "1", "2");
        $var5 = isset($this->item__type) ? in_array($this->item__type, $arr) : false;
        $var6 = SomethingWithSKU::checkSKU($this->SKU);
        if ($var1 and $var2 and $var3 and $var4 and $var5 and $var6)
            return true;
        else
            return false;
    }


    abstract public function outputInfo();

    abstract public function outputItem();

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

        $row = DataAccessService::getDataAccessor()->getSingleResultFromQuery("SELECT * FROM `Product` JOIN
    TypeSize  on Product.SKU = TypeSize.SKU WHERE Product.SKU='$SKU'");
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
        return $product;
    }

    public function outputInfo()
    {
        echo "<div class=\"info__box\">";
        echo "<a href=\"item_info.php?SKU=" . $this->SKU . "&name=" . $this->name . "\"><img src=\""
            . $this->image__link . "\" alt=\"pic\"></a>";
        echo "<div><table><tbody><tr><td><span>Name:</span></td><td><span>" . $this->name . "</span></td>";
        echo "</tr><tr><td><span>Price:</span></td><td><span>" . $this->price . "</span></td>";
        echo "</tr><tr><td><span>Attribute:</span></td><td><span>size=" . $this->size . "</span></td>";
        echo "</tr><tr><td><span>SKU:</span></td><td><span>" . $this->SKU . "</span></td>";
        echo "</tr></tbody></table></div></div>";
    }

    public function outputItem()
    {
        echo "<div class=\"content-info__box\"><div class=\"item__image\"><img src=\""
            . $this->image__link . "\" alt=\"pic\"></div>";
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
        return $product;
    }

    public function outputInfo()
    {
        echo "<div class=\"info__box\">";
        echo "<a href=\"item_info.php?SKU=" . $this->SKU . "&name=" . $this->name . "\"><img src=\""
            . $this->image__link . "\" alt=\"pic\"></a>";
        echo "<div><table><tbody><tr><td><span>Name:</span></td><td><span>" . $this->name . "</span></td>";
        echo "</tr><tr><td><span>Price:</span></td><td><span>" . $this->price . "</span></td>";
        echo "</tr><tr><td><span>Attribute:</span></td><td><span>HxWxL=" . $this->height . "x" . $this->width . "x"
            . $this->length . "</span></td>";
        echo "</tr><tr><td><span>SKU:</span></td><td><span>" . $this->SKU . "</span></td>";
        echo "</tr></tbody></table></div></div>";
    }

    public function outputItem()
    {
        echo "<div class=\"content-info__box\"><div class=\"item__image\"><img src=\""
            . $this->image__link . "\" alt=\"pic\"></div>";
        echo "<div><table><tbody><tr><td><span>Name:</span></td><td><span>" . $this->name . "</span></td>";
        echo "</tr><tr><td><span>Price:</span></td><td><span>" . $this->price . "</span></td>";
        echo "</tr><tr><td><span>Attribute:</span></td><td><span>HxWxL=" . $this->height . "x" . $this->width . "x"
            . $this->length . "</span></td>";
        echo "</tr><tr><td><span>SKU:</span></td><td><span>" . $this->SKU . "</span></td>";
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
        $row = DataAccessService::getDataAccessor()->getSingleResultFromQuery("SELECT * FROM `Product`
                                            JOIN TypeWeight  on Product.SKU = TypeWeight.SKU WHERE Product.SKU='$SKU'");
        $product = new WeightProduct();
        Product::initializeProduct(
            $product,
            $row["SKU"],
            $row["name"],
            $row["price"],
            $row["image__link"],
            $row["item__type"]
        );
        $product->weight = $row["weight"];
        return $product;
    }

    public function outputInfo()
    {
        echo "<div class=\"info__box\">";
        echo "<a href=\"item_info.php?SKU=" . $this->SKU . "&name=" . $this->name . "\"><img src=\""
            . $this->image__link . "\" alt=\"pic\"></a>";
        echo "<div><table><tbody><tr><td><span>Name:</span></td><td><span>" . $this->name . "</span></td>";
        echo "</tr><tr><td><span>Price:</span></td><td><span>" . $this->price . "</span></td>";
        echo "</tr><tr><td><span>Attribute:</span></td><td><span>weight=" . $this->weight . "</span></td>";
        echo "</tr><tr><td><span>SKU:</span></td><td><span>" . $this->SKU . "</span></td>";
        echo "</tr></tbody></table></div></div>";
    }

    public function outputItem()
    {
        echo "<div class=\"content-info__box\"><div class=\"item__image\"><img src=\""
            . $this->image__link . "\" alt=\"pic\"></div>";
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
        $var1 = isset($this->weight) ? filter_var($this->weight, FILTER_VALIDATE_INT) : false;

        if ($var1 == true)
            return true;
        else
            return false;
    }

    public function persistToDB()
    {
        DataAccessService::getDataAccessor()->executeQuery("INSERT INTO `Product`
                        (`SKU`, `name`, `price`, `image__link`, `item__type`)
                        VALUES ('$this->SKU', '$this->name', '$this->price','$this->image__link','$this->item__type')");
        DataAccessService::getDataAccessor()->executeQuery("INSERT INTO `TypeWeight`
                        (`SKU`, `weight`)
                        VALUES ('$this->SKU','$this->weight')");
    }
}


class SomethingWithSKU
{
    //public $SKU;
    //public function __construct()
    //{
    //}

    private static $instance = null;


    public static function getSKUAcc()
    {
        if (self::$instance == null) {
            self::$instance = new SomethingWithSKU();
        }
        return self::$instance;
    }

    public function genSKU()
    {
        do {
            $SKU = $this->randomSKU();
        } while ($this->checkSKU($SKU) == false);
        return strtoupper(mb_substr($SKU, 0, 8));
    }

    public function randomSKU()
    {
        return hash('md5', rand());
    }

    public static function checkSKU($SKU)
    {
        $getResult = DataAccessService::getDataAccessor()->getQueryResults("SELECT * FROM `Product`
                                                                                            WHERE SKU='$SKU'");
        $row = mysqli_fetch_assoc($getResult);
        if ($row["SKU"] == false)
            return true;
        else
            return false;
    }
}
