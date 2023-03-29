<?php include('navbar.php') ?>

<link rel="stylesheet" href="assets/css/profile.css">

<?php

include 'config.php';

$email = $_SESSION['email'];
$datafetchquery = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'");
$data = mysqli_fetch_array($datafetchquery);
$user_id = $data['id'];


$datafetchqueryprofile = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'");
$dataprofile = mysqli_fetch_array($datafetchqueryprofile);



?>


<div class="container mb-5 profileedit" >
    <h2 class="text-center mb-3">Edit Profile</h2>
    <form action="profile_editAction.php" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" name="username" value="<?php echo $dataprofile['username'] ?>" class="form-control" id="city">
        </div>

       
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" value="<?php echo $dataprofile['email'] ?>" class="form-control" id="city">
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" value="<?php echo $dataprofile['city'] ?>" class="form-control" id="city">
        </div>

        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile</label>
            <input type="text" name="mobile" value="<?php echo $dataprofile['mobile'] ?>" class="form-control" id="mobile">
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" value="<?php echo $dataprofile['age'] ?>" class="form-control" id="age" name="age">
        </div>

        <div class="mb-3">
            <label for="locality" class="form-label">Locality</label>
            <input type="text" value="<?php echo $dataprofile['locality'] ?>" class="form-control" id="locality" name="locality">
        </div>

        <div class="mb-3">
            <label for="postal_code" class="form-label">Postal Code</label>
            <input type="text" value="<?php echo $dataprofile['postal_code'] ?>" class="form-control" id="postal_code" name="postal_code">
        </div>


        <div class="mb-3">
            <label for="nimg" class="form-label">Image</label>
            <input type="file" id="fileupload" id="nimg" name="nimg" value="<?php echo $dataprofile['image'] ?>" class="form-control">
        </div>

        <div>
            <input type="text" name="oldImage" value="<?php echo $dataprofile['image'] ?>"  class="hiddeninput">
        </div>
        
        <button type="submit" class="btn btnupdate">Update Profile</button>
    </form>
</div>




<?php include('footer.php') ?>






