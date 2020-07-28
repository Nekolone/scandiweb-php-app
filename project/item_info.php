<?php
isset($_GET["name"]) ? $title = $_GET["name"] : $title = "ERROR";
include_once "header.php";
include_once "support_files/list_db.php";
?>


<a class="button" href="add.php">ADD PRODUCT</a>
</div>
</div>
</header>

<div class="main">
    <div class="container">
        <div class="content__box">
            <div class="item-info__box">
                <?php
                list_item($_GET["SKU"]);
                ?>
            </div>
        </div>
    </div>
</div>
</body>

</html>