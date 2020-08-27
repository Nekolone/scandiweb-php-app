<?php


use PHPUnit\Framework\TestCase;

include_once "./project/classes/AddProduct.php";
include_once "./project/classes/OutputInfoService.php";
include_once "./project/classes/InfoSavingService.php";
include_once "./project/classes/product/Product.php";
include_once "./project/classes/product/SizeProduct.php";
include_once "./project/classes/product/DimensionalProduct.php";
include_once "./project/classes/product/WeightProduct.php";
include_once "./project/classes/SKUValidator.php";
include_once "./project/classes/SKUGenerator.php";
include_once "./project/classes/DataAccessService.php";

class TestInitializeProduct extends TestCase
{
    public $sizeProduct;

    protected function setUp(): void
    {
        $this->sizeProduct = AddProduct::createProduct(
            "721DCCDA",
            "Chevrolet",
            "5999",
            "https://www.extremetech.com/wp-content/uploads/2019/12/SONATA-hero-option1-764A5360-edit.jpg",
            "0",
            "1400",
            "",
            "",
            "",
            ""
        );
    }

    protected function tearDown(): void
    {
    }

    public function testEqualsSKU()
    {
        $this->assertEquals("721DCCDA", $this->sizeProduct->SKU);
    }

    public function testEqualsName()
    {
        $this->assertEquals("Chevrolet", $this->sizeProduct->name);
    }

    public function testEqualsPrice()
    {
        $this->assertEquals("5999", $this->sizeProduct->price);
    }

    public function testEqualsImg()
    {
        $this->assertEquals(
            "https://www.extremetech.com/wp-content/uploads/2019/12/SONATA-hero-option1-764A5360-edit.jpg",
            $this->sizeProduct->image__link
        );
    }

    public function testEqualsType()
    {
        $this->assertEquals("0", $this->sizeProduct->item__type);
    }

    public function testEqualsSize()
    {
        $this->assertEquals("1400", $this->sizeProduct->size);
    }

    //public function testIsValidSize()
    //{
//
    //    $this->assertEquals(true, $this->sizeProduct->isValid());
    //}


}
