<?php

$title = "SEARCH";
include_once "header.php";

isset($_POST["done"]) ? header("Location:search_list.php?search=" . $_POST["search"]) : false;

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
                OutputInfoService::listSearchResult($_GET["search"]);
                ?>

            </div>
        </div>
    </div>
</div>
</body>

</html>
