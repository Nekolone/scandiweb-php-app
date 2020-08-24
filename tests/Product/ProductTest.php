<?php


use PHPUnit\Framework\TestCase;

include_once "./project/support_files/InformationProvider.php";
include_once "./project/validation.php";


class TestInitializeProduct extends TestCase
{
    public $sizeProduct;
    public $SKU;
    public $name;
    public $price;
    public $image__link;
    public $item__type;
    public $size;


    protected function setUp(): void
    {
        //$this->sizeProduct = new TestInitializeProduct();
        //Product::initializeProduct(
        //    $this->sizeProduct,
        //    "721DCCDA",
        //    "Chevrolet",
        //    "5999",
        //    "https://www.extremetech.com/wp-content/uploads/2019/12/SONATA-hero-option1-764A5360-edit.jpg",
        //    "3"
        //);
        //$this->sizeProduct->size = "1400";


        $this->sizeProduct = createProduct(
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
            $this->sizeProduct->image__link);
    }

    public function testEqualsType()
    {
        $this->assertEquals("0", $this->sizeProduct->item__type);
    }

    public function testEqualsSize()
    {
        $this->assertEquals("1400", $this->sizeProduct->size);
    }

    public function testIsValidSize()
    {

        $this->assertEquals(true, $this->sizeProduct->isValid());
    }

/*
    public function testFromDB()
    {
        //$mock = $this->createMock(SomeClass::class);
       // $mock->method(SizeProduct::fromDB($this->SKU))->willReturn('322');
        //$this->assertEquals("322", SizeProduct::fromDB($this->SKU));
        $mock = $this->getMockBuilder('SizeProduct')
            ->setMethods(['fromDB'])
            ->disableOriginalConstructor()
            ->getMock();
        $mock->expects($this->any())
            ->method('fromDB')
            ->will($this->returnValue(3332));

        $mock = $this->getMockBuilder('DataAccessService')
            ->setMethods(['getSingleResultFromQuery','__destruct'])
            ->disableOriginalConstructor()
            ->getMock();
        $mock->expects($this->any())
            ->method('getSingleResultFromQuery')
            ->will($this->returnValue(true));
        $mock->expects($this->any())
            ->method('__destruct')
            ->will($this->returnValue(NULL));
        $this->assertEquals("3332", SizeProduct::fromDB($this->SKU));
    }*/

}
