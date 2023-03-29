<?php include('navbar.php') ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
    *
    {
        text-decoration:none !important;
    }
    a{
      
        font-family: "Poppins", sans-serif !important;
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



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Profile Add</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="profileAction.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city">
        </div>
        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile</label>
            <input type="number" class="form-control" id="mobile" name="mobile">
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age">
        </div>

        <div class="mb-3">
            <label for="profession" class="form-label">Profession</label>
            <input type="text" class="form-control" id="profession" name="profession">
        </div>


        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        
        <button type="submit" class="btn btn-primary">Add Profile</button>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="container mb-5 profiletop">
    <div class="row">
        <div class="col-lg-4 text-center">
            <div>
            <?php
                if($dataprofile != '')
                {
                    echo "<img src='$image' alt='' class='myimg' class='img-thumbnail'>";

                } else{
                    echo "";
                }
            ?>
                
                <h4 class="ms-3 mt-3"><?php echo $data['username'] ?></h4>
              
                
               
            </div>
        </div>
        <div class="col-lg-2">
            
        </div>
        <div class="col-lg-5">
        <?php
        if($dataprofile == '')
        {
            echo "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
            Complete Profile
            </button>";

        } else{
            echo "<div class='card' style='width: 18rem;'>
            <div class='card-body'>
              <h3 class='card-title'>Profile</h3>
              <hr>
          
              <h6 class='card-subtitle mb-3'><span class='fw-bolder'>Age:</span> $age</h6>
              <h6 class='card-subtitle mb-3'><span class='fw-bolder'>City:</span>$city</h6>
              <h6 class='card-subtitle mb-3'><span class='fw-bolder'>Locality:</span> $locality</h6>
              <h6 class='card-subtitle mb-3'><span class='fw-bolder'>Postal Code:</span> $postal_code</h6>
              
              <hr>
              <div class='m-auto col-12 d-flex'>
              <a href='profileedit.php? id=$id' class='btn btn-info me-4'>Edit</a>
              <a href='deleteprofile.php? id=$id' class='btn btn-danger'>Deactivate Account</a>
              </div>
            </div>
          </div>";
        }
        
        ?>


        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
