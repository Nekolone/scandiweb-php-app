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
        } while (SKUValidator::checkSKU($SKU) == false);
        return strtoupper(mb_substr($SKU, 0, 8));
    }

    public function randomSKU()
    {
        return hash('md5', rand());
    }

}
