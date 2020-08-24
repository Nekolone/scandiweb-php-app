<?php

/**
 * Class InfoSavingService
 *
 * save information after page reload
 *
 * сохраняет информацию после перезагрузки страницы
 *
 */


class InfoSavingService
{

    public $SKU;
    public $name;
    public $price;
    public $image__link;
    public $item__type;
    public $size;

    public $height;
    public $width;
    public $length;

    public $weight;


    public function __construct()
    {
        $this->SKU = SKUGenerator::getSKUAcc()->genSKU();
        $this->name = "";
        $this->price = "";
        $this->image__link = "";
        $this->item__type = "0";
        $this->size = "";
        $this->height = "";
        $this->width = "";
        $this->length = "";
        $this->weight = "";
    }

    /**
     * Method ifSetDone
     *
     * update and save new information about object from $_POST
     *
     * обновляет и сохраняет информацию об оюбекте из $_POST
     *
     */

    public function ifSetDone()
    {
        $this->image__link = htmlspecialchars($_POST["image__link"]);
        if ($_POST["SKU"] != "")
            $this->SKU = htmlspecialchars($_POST["SKU"]);
        else
            $this->SKU = SKUGenerator::getSKUAcc()->genSKU();
        $this->name = htmlspecialchars($_POST["name"]);
        $this->price = htmlspecialchars($_POST["price"]);
        $this->item__type = htmlspecialchars($_POST["item__type"]);

        $this->size = htmlspecialchars($_POST["size"]);

        $this->height = htmlspecialchars($_POST["height"]);
        $this->width = htmlspecialchars($_POST["width"]);
        $this->length = htmlspecialchars($_POST["length"]);

        $this->weight = htmlspecialchars($_POST["weight"]);
    }

}
