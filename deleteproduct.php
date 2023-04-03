<?php
include 'config.php';




$id = $_POST['id'];



$insert_product = mysqli_query($conn, "DELETE FROM `product` WHERE id= {$id}");


if ($insert_product) {
    echo 1;
} else {
    echo 0;
}
?>