<?php

$title = "ADD PRODUCT";
include_once "header.php";

$pre_add_item = new InfoSavingService();

if (isset($_POST["done"])) {
    $pre_add_item->ifSetDone();

    $adderror = AddProduct::addCheck(
        $pre_add_item->SKU,
        $pre_add_item->name,
        $pre_add_item->price,
        $pre_add_item->image__link,
        $pre_add_item->item__type,
        $pre_add_item->size,
        $pre_add_item->height,
        $pre_add_item->width,
        $pre_add_item->length,
        $pre_add_item->weight
    );
}

?>


<a class="button" href="main.php">PRODUCT LIST</a>
</div>
</div>
</header>

<div class="main">
    <div class="container">
        <div class="content__box">
            <div class="form__box">
                <span id="ins_img"></span>
                <form action="#" method="post">
                    <label>Image link</label><br>
                    <input type="text" name="image__link" id="image__link" value="<?= $pre_add_item->image__link ?>"
                           onchange="run_img(this.value)"><br>
                    <label>SKU (auto generate if empty)</label><br>
                    <input type="text" name="SKU" value="<?= $pre_add_item->SKU ?>"> <br>
                    <label>Name</label><br>
                    <input type="text" name="name" value="<?= $pre_add_item->name ?>"><br>
                    <label>Price</label><br>
                    <input type="number" name="price" value="<?= $pre_add_item->price ?>"><br>
                    <label>Type</label>

                    <select name="item__type" id="item__type" onchange="run()">

                        <?php
                        switch ($pre_add_item->item__type) {
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
                            default:
                                throw new InvalidArgumentException("Item type is unknown:$pre_add_item->item__type");
                        }

                        ?>

                    </select><br><br>


                    <div class="size" id="size">
                        <label>Size </label><br>
                        <input type="text" name="size" value="<?= $pre_add_item->size ?>"><br><br>
                    </div>


                    <div class="HWL" id="hwl">
                        <label>Height mm</label><br>
                        <input type="number" name="height" value="<?= $pre_add_item->height ?>"><br>
                        <label>Width mm</label><br>
                        <input type="number" name="width" value="<?= $pre_add_item->width ?>"><br>
                        <label>Length mm</label><br>
                        <input type="number" name="length" value="<?= $pre_add_item->length ?>"><br><br>
                    </div>

                    <div class="weight" id="weight">
                        <label>Weight kg</label><br>
                        <input type="number" name="weight" value="<?= $pre_add_item->weight ?>"><br><br>
                    </div>

                    <?php

                    switch ($pre_add_item->item__type) {
                        case 0:
                            echo "<script>
                        $('.size').css(\"display\", \"block\");
                        $('.HWL').css(\"display\", \"none\");
                        $('.weight').css(\"display\", \"none\");
                    </script>";
                            break;
                        case 1:
                            echo "<script>
                        $('.size').css(\"display\", \"none\");
                        $('.HWL').css(\"display\", \"block\");
                        $('.weight').css(\"display\", \"none\");
                    </script>";
                            break;
                        case 2:
                            echo "<script>
                        $('.size').css(\"display\", \"none\");
                        $('.HWL').css(\"display\", \"none\");
                        $('.weight').css(\"display\", \"block\");
                    </script>";
                            break;
                    }


                    if ($adderror == 1) {
                        echo "ERRoR";
                    }

                    ?>

                    <input type="submit" class="button" name="done" value="SUBMIT">
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>
