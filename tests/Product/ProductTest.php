<?php


use PHPUnit\Framework\TestCase;

include_once "./project/support_files/InformationProvider.php";


class SizeProductTest extends TestCase
{
    private $sizeProduct;
    public $SKU;
    public $name;
    public $price;
    public $image__link;
    public $item__type;
    public $size;


    protected function setUp(): void
    {
        $this->sizeProduct= new SizeProductTest();
        Product::initializeProduct($this->sizeProduct, "721DCCDA", "Chevrolet", "5999",
            "https://www.extremetech.com/wp-content/uploads/2019/12/SONATA-hero-option1-764A5360-edit.jpg",
            "3");
        $this->sizeProduct->size="1400";
    }

    protected function tearDown(): void
    {
    }

    public function testInitializeProduct()
    {
        $this->assertEquals("721DCCDA", $this->sizeProduct->SKU);
    }

}
