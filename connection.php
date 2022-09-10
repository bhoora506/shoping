<?php 
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// database connection
function connection(){
    $con = mysqli_connect('192.168.1.63', 'bhoora', 'ubuy@123', 'bhoora_test');
    if(!$con){
        die("connection failed :" .mysqli_connect_error());
    }else{
        // echo "connect successfully";
    }
    return $con;
}

// insertdata
function insertdata($insert){
    $response = array(
        'message'=>'',
        'success'=> false,
    );
    $connection = connection();
    $sql = "INSERT INTO `shopping.com`(`name`, `image`, `price`, `minimum`, `maximum`, `discription`)
     VALUES('{$insert['item_name']}', '{$insert['item_image']}', '{$insert['item_price']}','{$insert['min_quantity']}', '{$insert['max_quantity']}', '{$insert['description']}')";
     $query = mysqli_query($connection,$sql);
     if($query){
        $response['success']= true;
     }else{
        $response['message']= "Sorry something went wrong";
     }
     return $response;
}               

// selectdata
function selectdata(){
    $row =array();
    $con = connection();
    $sql = "SELECT * FROM `shopping.com`";
    $query = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($query)){
        $row[]=$data;
    }
    return $row;
}


// select single data
function singledata($id){
$con = connection();
$sql = "SELECT * FROM `shopping.com` WHERE id = $id";
$query = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($query);
return $data;
}