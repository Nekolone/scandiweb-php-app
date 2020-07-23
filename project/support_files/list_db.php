<?php
include_once "set_db.php";


function printResult($result_set)
{
    while (($row = $result_set->fetch_assoc()) != false) {

        echo "<div class=\"info__box\">";
        echo "<a href=\"#\"><img src=\"" . $row["image_link"] . "\" alt=\"pic\"></a>";
        echo "<div><table><tbody><tr><td><span>Name:</span></td><td><span>" . $row["name"] . "</span></td>";
        echo "</tr><tr><td><span>Price:</span></td><td><span>" . $row["price"] . "</span></td>";
        switch ($row["item_type"]) {
            case 0:
                echo "</tr><tr><td><span>Attribute:</span></td><td><span>size=" . $row["size"] . "</span></td>";
                break;
            case 1:
                echo "</tr><tr><td><span>Attribute:</span></td><td><span>HxWxL=" . $row["height"] . "x" . $row["width"] . "x" . $row["length"] . "</span></td>";
                break;
            case 2:
                echo "</tr><tr><td><span>Attribute:</span></td><td><span>size=" . $row["width"] . "</span></td>";
                break;
        }
        echo "</tr><tr><td><span>SKU:</span></td><td><span>" . $row["SKU"] . "</span></td>";
        echo "</tr></tbody></table></div></div>";
    }
}


function list_item()
{
    $mysqli = msl();
    $mysqli->query("SET NAMES 'utf8'");
    $result_set = $mysqli->query("SELECT * FROM `Product` JOIN TypeSize  on Product.SKU = TypeSize.SKU");
    $mysqli->close();

    return $result_set;
}

?>

