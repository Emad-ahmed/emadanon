<?php include 'navbar.php'  ?>
<link rel="stylesheet" href="assets/css/login.css">


<div class="container">
        <form action="signupaction.php" method="post" class="sign-form" id="sign-form" autocomplete="on" onsubmit="return formValidation()">
            <h1 class="form-title ">Sign Up</h1>
            <br>
            <label for="username">Name<span class="star-required">*</span></label>
            <input type="text" name="username" id="username" placeholder="Name" autofocus required>
            <p class="mt-0 errorp" id="nerror"></p>

            <label for="email">Email<span class="star-required">*</span></label>
            <input type="email" name="email" id="email" placeholder="mail@website.com" required>
            <p class="mt-0 errorp" id="eerror"></p>

            <label for="mobile">Mobile<span class="star-required">*</span></label>
            <input type="text" name="mobile" id="mobile" placeholder="+88" required>
            <p class="mt-0 errorp" id="merror"></p>

            <label for="password">Password<span class="star-required">*</span></label>
            <input type="password" name="password" id="password" placeholder="Min. 8 character" required>
            <p class="mt-0 errorp" id="perror"></p>

            <label for="password">Confirm Password<span class="star-required">*</span></label>
            <input type="password" name="cpassword" id="password" placeholder="Min. 8 character" required>
            <p class="mt-0 errorp" id="cperror"></p>

            <br>

            

            <input type="submit" name="signup" value="Sign Up" id="submit">

            <div>
                <p class="have-account-line text-center">Already have an Account? <a href="login.php">Sign in</a></p>
            </div>
           
        </form>
    </div>

<script src="validation.js" ></script>