<?php

session_start();

if (isset($_SESSION['email']) || isset($_SESSION['adminemail'])) {
    session_unset();
    session_destroy();
    echo "<script>alert('Now In Logout Page')</script>";
    echo "<script>location.href = 'login.php'</script>";
} else {
    echo "<script>location.href = 'index.php'</script>";
}