<?php
include 'config.php';


$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$desprice = $_POST['desprice'];
$discount = $_POST['discount'];
$category = $_POST['category'];
$fimage = $_FILES['fimage'];
$bimage = $_FILES['bimage'];
$prodcode = $_FILES['prodcode'];


  
$imageLocation = $fimage['tmp_name'];
$imageName = $fimage['name'];
$imageDesfronted = 'ProductImage/' . $imageName;
move_uploaded_file($imageLocation, $imageDesfronted);

$imageLocation = $bimage['tmp_name'];
$imageName = $bimage['name'];
$imageDesbackend = 'ProductImage/' . $imageName;
move_uploaded_file($imageLocation, $imageDesbackend);


$insert_product = mysqli_query($conn, "INSERT INTO `product`(`title`, `description`, `price`, `discount_price`, `category`, `discount`, `front_image`, `back_image`, `prodcode`) VALUES ('$title','$description','$price','$desprice','$category', '$discount', '$imageDesfronted','$imageDesbackend', '$prodcode')");


if ($insert_product) {
    echo 1;
} else {
    echo 0;
}
?>