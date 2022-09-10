<section class="vh-100 bg-image" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8TDd3GSVGlJayHBLobJmNFGqEXgVpzYPLnA&usqp=CAU');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Add products here</h2>
                            <span><?php if (!empty($message)) {
                                        echo $message;
                                    } ?></span>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <label for="item_name">Item_name</label>
                                <input class="form-control" type="text" name="item_name" value="<?php if (isset($_POST['item_name'])) {
                                                                                                    echo $item_name;
                                                                                                } ?>">
                                <span style="color: red;"><?php if (!empty($php_error['item_name'])) {
                                                                echo $php_error['item_name'];
                                                            } ?></span><br><br>
                                <label for="item_image">Item_image</label>
                                <input class="form-control" type="file" name="item_image" value="<?php if (isset($_FILES["item_image"]["name"])) {
                                                                                                        echo $file;
                                                                                                    } ?>">
                                <span style="color: red;"><?php if (!empty($php_error['item_image'])) {
                                                                echo $php_error['item_image'];
                                                            } ?></span><br><br>
                                <label for="item_price">Item_price</label>
                                <input class="form-control" type="number" name="item_price" value="<?php if (isset($_POST['item_price'])) {
                                                                                                        echo $item_price;
                                                                                                    } ?>">
                                <span style="color: red;"><?php if (!empty($php_error['item_price'])) {
                                                                echo $php_error['item_price'];
                                                            } ?></span><br><br>
                                <label for="min_quantity">Min_quantity</label>
                                <input class="form-control" type="number" name="min_quantity" min="1" max="5" value="<?php if (isset($_POST['min_quantity'])) {
                                                                                                            echo $min_quantity;
                                                                                                        } ?>">
                                <span style="color: red;"><?php if (!empty($php_error['min_quantity'])) {
                                                                echo $php_error['min_quantity'];
                                                            } ?></span><br><br>
                                <label for="max_quantity">Max_quantity</label>
                                <input class="form-control" type="number" name="max_quantity" min="1" max="99" value="<?php if (isset($_POST['max_quantity'])) {
                                                                                                            echo $max_quantity;
                                                                                                        } ?>">
                                <span style="color: red;"><?php if (!empty($php_error['max_quantity'])) {
                                                                echo $php_error['max_quantity'];
                                                            } ?></span><br><br>
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" cols="30" rows="7" value="<?php if (isset($_POST['description'])) {
                                                                                                                echo $description;
                                                                                                            } ?>"></textarea>
                                <span style="color: red;"><?php if (!empty($php_error['description'])) {
                                                                echo $php_error['description'];
                                                            } ?></span><br><br>
                                <input class="add-to-cart btn btn-default" type="submit" name="submit" value="Add_item">
                                <button style="margin-left: 30px;" class="add-to-cart btn btn-default"><a href="display.php">Visit products</a></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>