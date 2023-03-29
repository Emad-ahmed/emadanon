<?php

include 'config.php';

session_start();

$email = $_SESSION['email'];
$datafetchquery = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'");
$data = mysqli_fetch_array($datafetchquery);
$id = $data['id'];


$username = $_POST['username'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$locality = $_POST['locality'];
$city = $_POST['city'];
$postal_code = $_POST['postal_code'];
$age = $_POST['age'];

$image = $_FILES['nimg'];
$oldImage = $_POST['oldImage'];


$imageLocation = $image['tmp_name'];
$imageName = $image['name'];
$imageDes = "ProfileImage/" . $imageName;


if (strlen($imageDes) > 13) {
    $updateQuery = "UPDATE `user` SET `username`='$username',`email`='$email',`mobile`='$mobile',`age`='$age',`city`='$city',`locality`='$locality',`postal_code`='$postal_code',`image`='$imageDes' WHERE id='$id'";
    move_uploaded_file($imageLocation, $imageDes);
} else{
    $updateQuery = "UPDATE `user` SET `username`='$username',`email`='$email',`mobile`='$mobile',`age`='$age',`city`='$city',`locality`='$locality',`postal_code`='$postal_code',`image`='$oldImage' WHERE id='$id'";
    move_uploaded_file($imageLocation, $oldImage);
}


if (!mysqli_query($conn, $updateQuery)) {
    die("Not updated!");
} else {
    echo "<script>alert('Data updated!!')</script>";
    echo "<script>location.href='profile.php'</script>";
}
