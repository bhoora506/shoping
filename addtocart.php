<?php
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
                $_SESSION['success'] = "Product has been added in your cart successfully.";
                header('location:cart.php');
            } else {
                if(empty($quantity)) {
                    $_SESSION['cart'][$id] = 1;
                    $_SESSION['success'] = "Product has been added in your cart successfully.";
                    header('location:cart.php');
                } else {
                    $_SESSION['error_message'] = "Please select $min to $max quantity";
                    header('location:details.php?id='.$id);
                }
            }
        }
    }
}
