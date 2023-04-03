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
$mycatview = $datapro["category"];

$_duplicate_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id' AND product_id  = '$id'");

if (mysqli_num_rows($_duplicate_cart) > 0) {
    echo "<script>location.href = 'cart.php'</script>";
} else{
    $insert_product = mysqli_query($conn, "INSERT INTO `cart`(`user_id`, `product_id`) VALUES ('$user_id','$id')");
    if ($insert_product) {
        echo 1;
    } else {
        echo 0;
    }
}


?>