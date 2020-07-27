<?php
include_once "InformationProvider.php";


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
            return new SizeProduct($SKU);
        case 1:
            return new DimensionalProduct($SKU);
        case 2:
            return new WeightProduct($SKU);
        default:
            throw new InvalidArgumentException("Item type is unknown:" . $row["item__type"]);
    }
}

?>

