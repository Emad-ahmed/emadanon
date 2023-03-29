<?php include 'navbar.php'  ?>
<link rel="stylesheet" href="assets/css/login.css">


<div class="container">
        <form action="loginAction.php" method="post" class="sign-form" id="sign-form" autocomplete="on">
            <h1 class="form-title ">Login</h1>
        

            <br>

    

            <label for="email">Email<span class="star-required">*</span></label>
            <input type="email" name="email" id="email" placeholder="mail@website.com" required>

           

            <label for="password">Password<span class="star-required">*</span></label>
            <input type="password" name="password" id="password" placeholder="Min. 8 character" required>

          

            <br>

            

            <input type="submit" value="Login In" name="login" id="submit">

            <div>
                <p class="have-account-line text-center">Create New Account? <a href="signup.php">Sign Up</a></p>
            </div>
           
        </form>
    </div>