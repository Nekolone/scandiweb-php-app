<?php
$title = "ADD PRODUCT";
include_once "header.php";
include_once "support_files/add_db.php";
include_once "support_files/save_add_info.php";
?>


<a class="button" href="main.php">PRODUCT LIST</a>
</div>
</div>
</header>

<div class="main">
    <div class="container">
        <div class="content__box">
            <div class="form__box">

                <form action="#" method="post">
                    <label> Image link</label><br>
                    <input type="text" name="image_link" value="<?= $image_link ?>"><br>
                    <label>SKU</label><br>
                    <input type="text" name="SKU" value="<?= $SKU ?>"> <?= $SKU ?><br>
                    <label>Name</label><br>
                    <input type="text" name="name" value="<?= $name ?>"><br>
                    <label>Price</label><br>
                    <input type="number" name="price" value="<?= $price ?>"><br>
                    <label>Type</label>
                    <select name="item__type" id="item__type" onchange="run()">
                        <?php
                        switch ($item__type) {
                            case 0:
                                echo "<option value=\"0\" selected >Size</option>
                        <option value=\"1\" >HxWxL</option>
                        <option value=\"2\" >Weight</option>";
                                break;
                            case 1:
                                echo "<option value=\"0\" >Size</option>
                        <option value=\"1\" selected >HxWxL</option>
                        <option value=\"2\" >Weight</option>";
                                break;
                            case 2:
                                echo "<option value=\"0\" >Size</option>
                        <option value=\"1\" >HxWxL</option>
                        <option value=\"2\" selected >Weight</option>";
                                break;

                        }
                        ?>
                    </select><br><br>
                    <div class="size" id="size">
                        <label>Size</label><br>
                        <input type="number" name="size" value="<?= $size ?>"><br><br>
                    </div>


                    <div class="HWL" id="hwl">
                        <label>Height</label><br>
                        <input type="number" name="height" value="<?= $height ?>"><br>
                        <label>Width</label><br>
                        <input type="number" name="width" value="<?= $width ?>"><br>
                        <label>Length</label><br>
                        <input type="number" name="length" value="<?= $length ?>"><br><br>
                    </div>

                    <div class="weight" id="weight">
                        <label>Weight</label><br>
                        <input type="number" name="weight" value="<?= $weight ?>"><br><br>
                    </div>


                    <?php
                    if (isset($adderror))
                        if ($adderror = 1)
                            echo "ERRoR";
                    ?>


                    <input type="submit" name="done">
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>