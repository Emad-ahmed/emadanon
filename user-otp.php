<?php include 'navbar.php'  ?>
<link rel="stylesheet" href="assets/css/login.css">




    <div class="container" style="margin-top:2rem;" id="sign-form">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="userotpAction.php" method="POST" autocomplete="off">
                    <h1 class="text-center mb-3">Code Verification</h1>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>

                   
                    <div class="form-group mb-4">
                        <input class="form-control" type="number" name="otp" placeholder="Enter verification code" required>
                    </div>
                    <div class="form-group col-6 mt-4">
                        <input class="form-control button" type="submit" name="check" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
   