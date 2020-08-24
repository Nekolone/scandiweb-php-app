<?php

/**
 * Class Product
 *
 * abstract class
 * work with main fields of product
 *
 * абстрактный класс
 * работает с основными полями продукта
 *
 */


abstract class Product
{

    public $SKU;
    public $name;
    public $price;
    public $image__link;
    public $item__type;

    public $addTime;



    public static function initializeProduct($product, $SKU, $name, $price, $image__link, $item__type)
    {
        $product->SKU = $SKU;
        $product->name = $name;
        $product->price = $price;
        $product->image__link = $image__link;
        $product->item__type = $item__type;
    }

    /**
     * Method isValid
     *
     * validate product before persist to database
     *
     * проверяет корректность введенных данных перед загрузкой в базу данных
     *
     */


    public function isValid()
    {
        $var1 = isset($this->SKU) ? strlen($this->SKU) == 8 : false;
        $var2 = isset($this->name) ? $this->name != "" : false;
        $var3 = isset($this->price) ? $this->price != "" : false;
        $var4 = isset($this->image__link) ? filter_var($this->image__link, FILTER_VALIDATE_URL) : false;
        $arr = array("0", "1", "2");
        $var5 = isset($this->item__type) ? in_array($this->item__type, $arr) : false;
        $var6 = SKUValidator::checkSKU($this->SKU);
        if ($var1 and $var2 and $var3 and $var4 and $var5 and $var6)
            return true;
        else
            return false;
    }

    /**
     * Method outputInfo & outputItem
     *
     * output product information
     *
     * вывод информации о продукте
     */

    abstract public function outputInfo();

    abstract public function outputItem();

    abstract public function persistToDB();

}
