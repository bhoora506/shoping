<?php
include_once 'connection.php';
$total = 0;
$grandtotal =0;
isset($subtotal)? $subtotal:"";
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : "";
$key = isset($_POST['product_id']) ? $_POST['product_id'] : "";

$data = singledata($key);
$max = $data['maximum'];
$min = $data['minimum'];
if ($quantity >= $min && $quantity <= $max) {
    $_SESSION['cart'][$key] = $quantity;
    foreach($_SESSION['cart'] as $id=>$qty){
        $data = singledata($id);
        $subtotal[$id] =  $qty * $data['price'];
        $grandtotal += $qty * $data['price'];
    }
}
$response = array(
    "quantity" => $quantity,
    "product_id" => $key,
    "subtotal" => $subtotal,
    "grandtotal" => $grandtotal,
);
echo json_encode($response);

