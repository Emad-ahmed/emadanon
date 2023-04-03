<?php

include 'config.php';
session_start();

if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $check_email = "SELECT * FROM user WHERE email = '$email'";
    $res = mysqli_query($conn, $check_email);
    if(mysqli_num_rows($res) > 0){
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if(password_verify($password, $fetch_pass)){
            $_SESSION['email'] = $email;
            $status = $fetch['status'];
            if($status == 'verified'){
              $_SESSION['email'] = $email;
              $_SESSION['password'] = $password;
              header('location: index.php');
            } 
            else{
                $info = "It's look like you haven't still verify your email - $email";
                echo "<script>alert('It's look like you haven't still verify your email - $email')</script>";
                $_SESSION['info'] = $info;
                header('location: index.php');
            }
        }else{
            echo "<script>alert('Incorrect email or password!!')</script>";
            echo "<script>location.href = 'login.php'</script>";
         
        }
    }elseif($email == 'amadahmed1234678@gmail.com' && $password == 'amadking123'){
            $_SESSION["name"] = 'Admin';
            $_SESSION["key"] ='admin';
            $_SESSION["email"] = $email;
            header("location:index.php");

    } 
    else{
        
        echo "<script>alert('It's look like you're not yet a member! Click on the bottom link to signup.!!')</script>";
        echo "<script>location.href = 'login.php'</script>";
       
    }
}
