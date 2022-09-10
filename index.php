<?php
include_once 'connection.php';
$tpl = 'index.tpl.php';

if (isset($_POST['submit'])) {
    $valid = true;
    $message = "";
    $php_error = array();
    $item_name = $_POST['item_name'];
    // $item_image = isset($_POST['item_image']) ? $_POST['item_image']:"";
    $item_price = $_POST['item_price'];
    $max_quantity = $_POST['max_quantity'];
    $min_quantity = $_POST['min_quantity'];
    $description = $_POST['description'];
    $tmpname = $_FILES["item_image"]["tmp_name"];
    $file = $_FILES["item_image"]["name"];
    $folder = "../images/".$file;
    move_uploaded_file($tmpname,$folder);
    if (empty($item_name)) {
        $php_error['item_name'] = "item_name is required";
        $valid = false;
    } elseif (!preg_match("/^[a-zA-Z_ ']*$/", $item_name)) {
        $php_error['item_name'] = "Only alphabets and whitespace are allowed.";
        $valid = false;
    }
    if (empty($file)) {
        $php_error['item_image'] = "item_image is required";
        $valid = false;
    }
    if (empty($item_price)) {
        $php_error['item_price'] = "item_price is required";
        $valid = false;
    }
    if (empty($max_quantity)) {
        $php_error['max_quantity'] = "max_quantity is required";
        $valid = false;
    }
    if (empty($min_quantity)) {
        $php_error['min_quantity'] = "min_quantity is required";
        $valid = false;
    }
    if (empty($description)) {
        $php_error['description'] = "Please fill the item details";
        $valid = false;
    }
    if ($valid) {
        $insert = array(
            'item_name' => $_POST['item_name'],
            'item_image' => $_FILES["item_image"]["name"],
            'item_price' => $_POST['item_price'],
            'max_quantity' => $_POST['max_quantity'],
            'min_quantity' => $_POST['min_quantity'],
            'description' => $_POST['description'],
        );
        $response = insertdata($insert);
        if ($response['success'] == true) {
            $message = "insreted data successfully";
            header('location:display.php');
        } else {
            $message = $response['message'];
        }
    }
}

include_once 'layout/template.php';
