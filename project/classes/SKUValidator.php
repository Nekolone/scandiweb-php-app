<?php

/**
 * Class SKUValidator
 *
 * check SKU
 *
 * проверяет SKU
 *
 */


class SKUValidator
{


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
