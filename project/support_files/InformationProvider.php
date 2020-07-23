<?php

abstract class Product
{
    public $SKU;
    public $name;
    public $price;
    public $image__link;
    public $item__type;

    abstract public function outputInfo();

}


class SizeProduct extends Product
{
    public $size;

    function __construct($SKU)
    {

        $mysqli = msl();
        $mysqli->query("SET NAMES 'utf8'");
        $getRow = $mysqli->query("SELECT * FROM `Product` JOIN TypeSize  on Product.SKU = TypeSize.SKU WHERE Product.SKU='$SKU'");
        $row = mysqli_fetch_assoc($getRow);
        $mysqli->close();

        $this->SKU = $row["SKU"];
        $this->name = $row["name"];
        $this->price = $row["price"];
        $this->image__link = $row["image__link"];
        $this->item__type = $row["item__type"];
        $this->size = $row["size"];
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

}

class DimensionalProduct extends Product
{
    public $height;
    public $width;
    public $length;

    function __construct($SKU)
    {
        $mysqli = msl();
        $mysqli->query("SET NAMES 'utf8'");
        $getRow = $mysqli->query("SELECT * FROM `Product` JOIN TypeHWL on Product.SKU = TypeHWL.SKU WHERE Product.SKU='$SKU'");
        $row = mysqli_fetch_assoc($getRow);
        $mysqli->close();

        $this->SKU = $row["SKU"];
        $this->name = $row["name"];
        $this->price = $row["price"];
        $this->image__link = $row["image__link"];
        $this->item__type = $row["item__type"];
        $this->height = $row["height"];
        $this->width = $row["width"];
        $this->length = $row["length"];
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
}

class WeightProduct extends Product
{
    public $weight;

    function __construct($SKU)
    {
        $mysqli = msl();
        $mysqli->query("SET NAMES 'utf8'");
        $getRow = $mysqli->query("SELECT * FROM `Product` JOIN TypeWeight  on Product.SKU = TypeWeight.SKU WHERE Product.SKU='$SKU'");
        $row = mysqli_fetch_assoc($getRow);
        $mysqli->close();

        $this->SKU = $row["SKU"];
        $this->name = $row["name"];
        $this->price = $row["price"];
        $this->image__link = $row["image__link"];
        $this->item__type = $row["item__type"];
        $this->weight = $row["weight"];

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
}
