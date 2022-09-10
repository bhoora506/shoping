<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre> Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque quod doloremque sint quo nihil dicta cumque iste voluptas id et at, non commodi, voluptates assumenda vel ducimus impedit quibusdam ullam.</pre>
    <img src="/bhoora/images/61slX-7NlrL._AC_UY300_.jpg" alt="">
</body>
</html>

<?php $image = "/bhoora/images/".$data['image']; ?>
<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img   height="350px"; width="" src="<?php echo $image;?>"/></div>
                    </div>
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title"><?php echo $data['name'] ?></h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">41 reviews</span>
                    </div>
                    <p class="product-description"><?php echo $data['discription']; ?>.</p>
                    <h4 class="price">current price: <span>&#8377; <?php echo $data['price']; ?></span></h4>
                    <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
                    <h5 class="sizes">sizes:
                        <span class="size" data-toggle="tooltip" title="small">s</span>
                        <span class="size" data-toggle="tooltip" title="medium">m</span>
                        <span class="size" data-toggle="tooltip" title="large">l</span>
                        <span class="size" data-toggle="tooltip" title="xtra large">xl</span>
                    </h5>
                    <div class="action">
                        <form action="" method="POST">
                        <select style="margin-left: 40px;" class="like btn btn-default" name="quantity">
                            <option value="">-Quqntity-</option>
                            <?php for($i=$data['minimum'];$i<=$data['maximum'];$i++) { ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php }?>
                        </select>
                        <button class="add-to-cart btn btn-default" type="submit" name="addtocart">
                             <a href="addtocart.php?id=<?php echo $data['id'];?>">Add to cart</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'connection.php';
$tpl = 'addtocart.tpl.php';
$id = isset($_POST['id']) ? $_POST['id'] : "";
if (!empty($id)){
    $data = singledata($id);
    $quantity = $_POST['quantity'];
    $_SESSION['cart'][$id] = $data ;
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty'] = $quantity;
        print_r($_SESSION['cart'][$id]);
    } else {
        $_SESSION['cart'][$id]['qty'] = 1;
    }
}
include_once 'layout/template.php';
// 
include_once 'connection.php';

$id = isset($_POST['id']) ? $_POST['id'] : "";
if (!empty($id)) {
    $quantity = $_POST['quantity'];
    $data = singledata($id);
    $min = $data['minimum'];
    $max = $data['maximum'];
    if (isset($_SESSION['cart'][$id])) {
        if ($quantity >= $min && $quantity <= $max) {
            $_SESSION['cart'][$id] += $quantity;
            header('location:cart.php');
        }
    } else {
        if (isset($quantity)) {
            if ($quantity >= $min && $quantity <= $max) {
                $_SESSION['cart'][$id] =  $quantity;
                $_SESSION['success'][$id] = "Product has been added in your cart successfully.";
                header('location:cart.php');
            } elseif(empty($quantity)) {
                $_SESSION['cart'][$id] = 1;
                $_SESSION['success'][$id] = "Product has been added in your cart successfully.";
                header('location:cart.php');
            } else {
                $_SESSION['message'][$id] = "Please select $min to $max quantity";
                header('location:details.php?id=' . $id);
            } 
        }
    }
}






include_once 'connection.php';
// $tpl = 'cart.php';
$id = isset($_POST['id']) ? $_POST['id'] : "";
// $success = "";

if (!empty($id)) {
    $quantity = $_POST['quantity'];
    $data = singledata($id);
    $min = $data['minimum'];
    $max = $data['maximum'];
    if (isset($_SESSION['cart'][$id])){
      if($quantity >= $min && $quantity <= $max) {
        $_SESSION['cart'][$id] += $quantity;
        header('location:cart.php');
      }
    } else {
      if (isset($quantity)) {
        if ($quantity >= $min && $quantity <= $max) {
          $_SESSION['cart'][$id] =  $quantity;
          echo $_SESSION['message'][$id] = "Product has been added in your cart successfully.";
          header('location:cart.php');
        } else {
          if (empty($quantity)) {
            $_SESSION['cart'][$id] = 1;
            echo $_SESSION['message'][$id] = "Product has been added in your cart successfully.";
            header('location:cart.php');
          } else {
           echo $_SESSION['message'][$id] = "Please select $min to $max quantity";
            header('location:details.php?id='.$id);
          }
        }
      }
    }
  }







include_once 'connection.php';
$id = isset($_POST['id']) ? $_POST['id'] : "";
if (!empty($id)) {
    $quantity = $_POST['quantity'];
    $data = singledata($id);
    $min = $data['minimum'];
    $max = $data['maximum'];
    if (isset($_SESSION['cart'][$id])) {
        if ($quantity >= $min && $quantity <= $max) {
            $_SESSION['cart'][$id] += $quantity;
            header('location:cart.php');
        }
    } else {
        if (isset($quantity)) {
            if ($quantity >= $min && $quantity <= $max) {
                $_SESSION['cart'][$id] =  $quantity;
                // $_SESSION['success'][$id] = "Product has been added in your cart successfully.";
                header('location:cart.php');
            } else {
                // $_SESSION['message'][$id] = "Please select $min to $max quantity";
                header('location:details.php?id=' . $id);
            }
        } else {
            if (empty($quantity)) {
                echo "djsfh";
                $_SESSION['cart'][$id] = 1;
                // $_SESSION['success'][$id] = "Product has been added in your cart successfully.";
                header('location:cart.php');
            } else {
                echo "djsfh";
                // $_SESSION['message'][$id] = "Please select $min to $max quantity";
                header('location:details.php?id='.$id);
            }
        }
    }
}

foreach ($_SESSION['cart'] as $id => $qty) {
    $data = singledata($id);
    print_r($data);
    $subtotal[$id] = $qty * $data['price'];
    $grandtotal += $qty* $data['price'];
}
