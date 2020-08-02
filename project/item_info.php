<?php
isset($_GET["name"]) ? $title = $_GET["name"] : $title = "ERROR";
include_once "header.php";
include_once "support_files/list_db.php";
if (isset($_POST["done"]))
    deleteItem($_GET["SKU"]);
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
                listItem($_GET["SKU"]);
                ?>
                <form action="#" method="post">
                    <input type="submit" class="item__center" name="done" value="delete">
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>
