<?php 
include_once 'connection.php';
$id = isset($_POST['id'])? $_POST['id']:"";
unset($_SESSION['cart'][$id]);
header('location:cart.php');

