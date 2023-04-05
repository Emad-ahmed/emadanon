<?php
        include 'config.php';
        session_start();

        if(isset($_SESSION['email']) && !isset($_SESSION["name"]))
        {

          $email = $_SESSION['email'];
          $datafetchquery = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'");
          $data = mysqli_fetch_array($datafetchquery);
          $user_id = $data['id'];


          $sql = "SELECT * from cart WHERE cart.user_id = '$user_id'";

          if ($result = mysqli_query($conn, $sql)) {
  
              // Return the number of rows in result set
              $rowcount = mysqli_num_rows( $result );

              echo $rowcount;
            
          }
        }

       
        ?>