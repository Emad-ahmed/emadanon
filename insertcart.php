<?php
include 'config.php';

session_start();


$id = $_POST['id'];
$email = $_SESSION['email'];

$datafetchquery = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'");
$data = mysqli_fetch_array($datafetchquery);
$user_id = $data['id'];


$datafetchproduct = mysqli_query($conn, "SELECT * FROM `product` WHERE id = '$id'");
$datapro = mysqli_fetch_array($datafetchproduct);


$insert_product = mysqli_query($conn, "INSERT INTO `cart`(`user_id`, `product_id`) VALUES ('$user_id','$id')");


if ($insert_product) {
    echo 1;
} else {
    echo 0;
}
?>