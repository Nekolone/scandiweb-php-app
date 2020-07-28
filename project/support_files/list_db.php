<?php
include_once "InformationProvider.php";


function list_search_result($search){
    $getResult = DataAccessService::getDataAccessor()->getQueryResults("SELECT SKU, item__type FROM `Product` WHERE name like '%$search%'");
    while ($row = mysqli_fetch_assoc($getResult)) {
        get_product($row)->outputInfo();
    }
}

function list_item($SKU){
    $getResult = DataAccessService::getDataAccessor()->getQueryResults("SELECT SKU, item__type FROM `Product` WHERE SKU='$SKU'");
    $row = mysqli_fetch_assoc($getResult);
    get_product($row)->outputInfo();
}

function list_result()
{
    $getResult = DataAccessService::getDataAccessor()->getQueryResults("SELECT SKU, item__type FROM `Product`");
    while ($row = mysqli_fetch_assoc($getResult)) {
        get_product($row)->outputInfo();
    }
}

function get_product($row)
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


