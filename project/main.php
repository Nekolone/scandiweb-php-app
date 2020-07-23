<?php
$title = "PRODUCT LIST";
include_once "header.php";
include_once "support_files/list_db.php";
?>

[[tut dopustim poisk]]
<a class="button" href="add.php">ADD PRODUCT</a>
</div>
</div>
</header>

<div class="main">
    <div class="container">
        <div class="content__box">
            <div class="item__box">
                <?php

                 list_result();

                //                $mysqli = new mysqli('localhost:3306', 'admin', 'if5eIVpQGpSO', 'shopdb');
                //
                //                $mysqli->query("SET NAMES 'utf8'");
                //                $result_set = $mysqli->query("SELECT * FROM `Product`");
                //                $mysqli->close();
                //
                //                while (($row = mysqli_fetch_assoc($result_set))) {
                //
                //                    echo "<div class=\"info__box\">";
                //                    echo "<a href=\"#\"><img src=\"" . $row["imgLink"] . "\" alt=\"pic\"></a>";
                //                    echo "<div><table><tbody><tr><td><span>Name:</span></td><td><span>" . $row["name"] . "</span></td>";
                //                    echo "</tr><tr><td><span>Price:</span></td><td><span>" . $row["price"] . "</span></td>";
                //                    echo $row["type"];
                //                    switch ($row["type"]) {
                //                        case 0:
                //                            echo "</tr><tr><td><span>Attribute:</span></td><td><span>size=" . $row["size"] . "</span></td>";
                //                            break;
                //                        case 1:
                //                            echo "</tr><tr><td><span>Attribute:</span></td><td><span>HxWxL=" . $row["height"] . " x " . $row["width"] . " x " . $row["length"] . "</span></td>";
                //                            break;
                //                        case 2:
                //                            echo "</tr><tr><td><span>Attribute:</span></td><td><span>weight=" . $row["weight"] . "</span></td>";
                //                            break;
                //                    }
                //                    echo "</tr><tr><td><span>SKU:</span></td><td><span>" . $row["SKU"] . "</span></td>";
                //                    echo "</tr></tbody></table></div></div>";
                //                }
                //                //$result_set = list_item();
                //                //printResult($result_set);

                ?>
                <div class="info__box">
                    <a href="#">
                        <img src="https://sun1-21.userapi.com/zRvW6840WZKmcBKkUblIFCYM-SA698L2SSXh6w/N0DwuwKHmtM.jpg"
                             alt="pic"></a>
                    <div>
                        <table>
                            <tbody>
                            <tr>
                                <td><span>Name:</span></td>
                                <td><span>Name</span></td>
                            </tr>
                            <tr>
                                <td><span>Price:</span></td>
                                <td><span>250Eur</span></td>
                            </tr>
                            <tr>
                                <td><span>Attribute:</span></td>
                                <td><span>250x145x230</span></td>
                            </tr>
                            <tr>
                                <td><span>SKU:</span></td>
                                <td><span>123456</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="test__box">1</div>
                <div class="test__box">1</div>
                <div class="test__box">1</div>
                <div class="test__box">1</div>
                <div class="test__box">1</div>
                <div class="test__box">1</div>
                <div class="test__box">1</div>
                <div class="test__box">1</div>
                <div class="test__box">1</div>
                <div class="test__box">1</div>
            </div>
        </div>
    </div>
</div>
</body>

</html>