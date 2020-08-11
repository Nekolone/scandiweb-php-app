<?php
include_once "InformationProvider.php";


function listSearchResult($search)
{
    $getResult = DataAccessService::getDataAccessor()->getQueryResults("SELECT SKU, item__type FROM `Product`
                                                                                WHERE name like '%$search%'");
    while ($row = mysqli_fetch_assoc($getResult)) {
        getProduct($row)->outputInfo();
    }
}

function listItem($SKU)
{
    $getResult = DataAccessService::getDataAccessor()->getQueryResults("SELECT SKU, item__type FROM `Product`
                                                                                WHERE SKU='$SKU'");
    $row = mysqli_fetch_assoc($getResult);
    getProduct($row)->outputItem();
}

function listResult()
{
    $getResult = DataAccessService::getDataAccessor()->getQueryResults("SELECT SKU, item__type FROM `Product`");
    while ($row = mysqli_fetch_assoc($getResult)) {
        getProduct($row)->outputInfo();
    }
}

function deleteItem($SKU)
{
    DataAccessService::getDataAccessor()->getQueryResults("DELETE FROM `TypeSize` WHERE SKU='$SKU'");
    DataAccessService::getDataAccessor()->getQueryResults("DELETE FROM `TypeHWL` WHERE SKU='$SKU'");
    DataAccessService::getDataAccessor()->getQueryResults("DELETE FROM `TypeWeight` WHERE SKU='$SKU'");
    DataAccessService::getDataAccessor()->getQueryResults("DELETE FROM `Product` WHERE SKU='$SKU'");
    header("Location:main.php");
}


function getProduct($row)
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


