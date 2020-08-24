<?php

$title = "PRODUCT LIST";
include_once "header.php";

isset($_POST["done"]) ? header("Location:search_list.php?search=" . $_POST["search"]) : false;

if (isset($_POST["deleteALL"]))
    OutputInfoService::deleteDB();

?>

<form action="" method="post">
    <input type="text" class="search__line" name="search" placeholder="<?= $_GET["search"] ?>"><br>
    <input type="submit" class="button" name="done" value="SEARCH">
</form>

<a class="button" href="add.php">ADD PRODUCT</a>
</div>
</div>
</header>

<div class="main">
    <div class="container">
        <div class="content__box">
            <div class="item__box">

                <?php
                OutputInfoService::listResult();
                ?>

            </div>
        </div>
        <form action="#" method="post">
            <input type="submit" class="deleteDB button" name="deleteALL" value="delete DB">
        </form>
    </div>
</div>
</body>

</html>
