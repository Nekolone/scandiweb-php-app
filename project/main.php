<?php
$title = "PRODUCT LIST";
include_once "header.php";
include_once "support_files/list_db.php";

isset($_POST["done"])?header("Location:search_list.php?search=".$_POST["search"]):false;
?>
<form action="" method="post">
    <input type="text" name="search" placeholder="<?=$_GET["search"]?>"><br>
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
                <div class="info__box">
                    <a href="#">
                        <img src="https://sun1-21.userapi.com/zRvW6840WZKmcBKkUblIFCYM-SA698L2SSXh6w/N0DwuwKHmtM.jpg"
                             alt="pic"></a>
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
