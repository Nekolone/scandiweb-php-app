<?php
$title = "PRODUCT LIST";
include_once "header.php";
include_once "support_files/list_db.php";

isset($_POST["done"])?header("Location:search_list.php?search=".$_POST["search"]):false;
?>
<form action="" method="post">
    <input type="text" class="search__line" name="search" placeholder="<?=$_GET["search"]?>"><br>
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
                 listResult();

                ?>

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
