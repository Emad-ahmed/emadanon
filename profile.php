<?php include('navbar.php') ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/profile.css">
<style>
    *
    {
        text-decoration:none !important;
    }
    a{
      
        font-family: "Poppins", sans-serif !important;
    }
    .btn-color
    {
        background: #23236A !important;
        color:white !important;
    }
</style>

<?php

include 'config.php';

$email = $_SESSION['email'];


if (!isset($email)) {
    echo "<script>location.href = 'login.php'</script>";
}

if(isset($_SESSION['email']))
{
  $email = $_SESSION['email'];
  $datafetchquery = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'");
  $data = mysqli_fetch_array($datafetchquery); 

  $user_name = $data['username'];
 
} else{
  $user_name = "";

}

$datafetchqueryprofile = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'");
$dataprofile = mysqli_fetch_array($datafetchqueryprofile);
$id = $dataprofile['id'];


if ($dataprofile != '')
{
    $image = $dataprofile['image'];
    $dataid = $dataprofile['id'];
    $city = $dataprofile['city'];
    $age = $dataprofile['age'];
    $locality = $dataprofile['locality'];
    $postal_code = $dataprofile['postal_code'];
    
}
?>   




<div class="container mb-5 profiletop mt-5 text-center">
        <?php
        echo "<div class='card'>
          
            <img src='$image' alt='' class='myimg' class='img-thumbnail'>
            <div class='card-body'>
            <h3 class='mt-3'>$data[username]</h3>
              <hr>
              <div class='w-50 m-auto'>
              <h6 class='card-subtitle mb-3'><i class='fa fa-calendar' aria-hidden='true'></i> <span class='fw-bolder'>Age:</span> $age</h6>
              <h6 class='card-subtitle mb-3'><i class='fa fa-globe' aria-hidden='true'></i> <span class='fw-bolder'>City:</span>$city</h6>
              <h6 class='card-subtitle mb-3'><i class='fa fa-map-marker' aria-hidden='true'></i> <span class='fw-bolder'>Locality:</span> $locality</h6>
              <h6 class='card-subtitle mb-3'><i class='fa fa-clipboard' aria-hidden='true'></i> <span class='fw-bolder'>Postal Code:</span> $postal_code</h6>
              </div>
              <hr>
              <div class='text-center'>
              <a href='profileedit.php? id=$id' class='btn btn-color me-4'>Edit</a>
              <a href='deleteprofile.php? id=$id' class='btn btn-danger'>Deactivate Account</a>
              </div>
            </div>
          </div>";

          ?>
    
        
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<?php include('footer.php') ?>
