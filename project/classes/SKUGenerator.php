<?php

/**
 * Class SKUGenerator
 *
 * generate SKU
 *
 * генерирует SKU
 *
 */


class SKUGenerator
{

    private static $instance = null;

    private $validator;

    public function __construct()
    {
        $this->validator=new SKUValidator();
    }

    public static function getSKUAcc()
    {
        if (self::$instance == null) {
            self::$instance = new SKUGenerator();
        }
        return self::$instance;
    }

    public function genSKU()
    {
        do {
            $SKU = $this->randomSKU();
        } while ($this->validator->checkSKU($SKU) == false);
        return strtoupper(mb_substr($SKU, 0, 8));
    }

    public function randomSKU()
    {
        return hash('md5', rand());
    }

}
