<?php

$errors = array();

include 'config.php';

session_start();

if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);   
    $email = mysqli_real_escape_string($conn, $_POST['email']);  
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);  
    $password = mysqli_real_escape_string($conn, $_POST['password']); 
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Password not matched!";
        echo "<script>alert('Password not matched!')</script>";
        echo "<script>location.href = 'signup.php'</script>";
    }
    $email_check = "SELECT * FROM user WHERE email = '$email'"; 
    $res = mysqli_query($conn, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
        echo "<script>alert('Email that you have entered is already exist!')</script>";
        echo "<script>location.href = 'signup.php'</script>";
    }

    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);  
        $code = rand(999999, 111111);   
        $status = "notverified"; 
        $insert_data = "INSERT INTO user (username, email, mobile, password, code, status)
                        values('$name', '$email', '$mobile', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($conn, $insert_data);

        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: elearningweb2023@gmail.com";  
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                echo "<script>alert('Failed while sending code!')</script>";
                echo "<script>location.href = 'signup.php'</script>";
            }
            
        }else{
            echo "<script>alert('Failed while inserting data into database!')</script>";
            echo "<script>location.href = 'signup.php'</script>";
         
        }
    }

}