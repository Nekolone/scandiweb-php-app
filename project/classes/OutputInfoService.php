<?php

/**
 * Class OutputInfoService
 *
 * all for output information from database
 *
 * все для вывода информации из базы данных
 *
 */


class OutputInfoService
{

    public static function listSearchResult($search)
    {
        $getResult = DataAccessService::getDataAccessor()->getQueryResults("SELECT SKU, item__type FROM `Product`
                                                                                WHERE name like '%$search%'");
        while ($row = mysqli_fetch_assoc($getResult)) {
            self::getProduct($row)->outputInfo();
        }
    }

    public static function listItem($SKU)
    {
        $row = DataAccessService::getDataAccessor()->getSingleResultFromQuery("SELECT SKU, item__type FROM `Product`
                                                                                WHERE SKU='$SKU'");
        self::getProduct($row)->outputItem();
    }

    public static function listResult()
    {
        $getResult = DataAccessService::getDataAccessor()->getQueryResults("SELECT SKU, item__type FROM `Product`");
        while ($row = mysqli_fetch_assoc($getResult)) {
            self::getProduct($row)->outputInfo();
        }
    }

    public static function deleteItem($SKU)
    {
        DataAccessService::getDataAccessor()->getQueryResults("DELETE FROM `TypeSize` WHERE SKU='$SKU'");
        DataAccessService::getDataAccessor()->getQueryResults("DELETE FROM `TypeHWL` WHERE SKU='$SKU'");
        DataAccessService::getDataAccessor()->getQueryResults("DELETE FROM `TypeWeight` WHERE SKU='$SKU'");
        DataAccessService::getDataAccessor()->getQueryResults("DELETE FROM `Product` WHERE SKU='$SKU'");
        header("Location:main.php");
    }

    public static function deleteDB()
    {
        DataAccessService::getDataAccessor()->getQueryResults("DELETE FROM `TypeSize`");
        DataAccessService::getDataAccessor()->getQueryResults("DELETE FROM `TypeHWL`");
        DataAccessService::getDataAccessor()->getQueryResults("DELETE FROM `TypeWeight`");
        DataAccessService::getDataAccessor()->getQueryResults("DELETE FROM `Product`");
        header("Location:main.php");
    }


    private static function getProduct($row)
    {
        $SKU = $row["SKU"];
        switch ($row["item__type"]) {
            case 0:
                return SizeProduct::fromDB($SKU);
            case 1:
                return DimensionalProduct::fromDB($SKU);
            case 2:
                return WeightProduct::fromDB($SKU);
            default:
                throw new InvalidArgumentException("Item type is unknown:" . $row["item__type"]);
        }
    }

}
