<?php include 'navbar.php'  ?>
<link rel="stylesheet" href="assets/css/login.css">
<?php

include 'config.php';

$category = $_GET['category'];



?>

<style>
    .text-center
    {
    text-align: center !important;
    font-size:1.5rem;
    margin-top: 1rem;
    }

    .showcase{
        width:100% !important;
    }
</style>
<div id="successmessage">
   
</div>

<div id="errormessage">
   
</div>

<div class="container">
<div class="product-main">
              <h2 class="title text-center"><?php echo $category  ?></h2>

              <div class="product-grid">
                

              <?php
        
                $alldata = mysqli_query($conn, "SELECT * FROM `product` WHERE category = '$category'  ORDER BY id DESC");

                while ($row = mysqli_fetch_array($alldata)) {
                

                echo "<div class='showcase'>
                  <div class='showcase-banner'>
                    <img
                      src='$row[front_image]'
                      alt='Womens Party Wear Shoes'
                      class='product-img default'
                      width='300'
                    />
                    <img
                      src='$row[back_image]'
                      alt='Womens Party Wear Shoes'
                      class='product-img hover'
                      width='300'
                    />

                    <p class='showcase-badge angle black'>$row[discount]% off</p>

                    <div class='showcase-actions'>
                      <button class='btn-action'>
                        <ion-icon name='heart-outline'></ion-icon>
                      </button>

                      <button class='btn-action'>
                        <ion-icon name='eye-outline'></ion-icon>
                      </button>

                      <button class='btn-action'>
                        <ion-icon name='repeat-outline'></ion-icon>
                      </button>

                      <button class='btn-action' data-id ='{$row["id"]}' id='cartaction'>
                        <ion-icon name='bag-add-outline'></ion-icon>
                      </button>
                    </div>
                  </div>

                  <div class='showcase-content'>
                    <a href='#' class='showcase-category'>$row[title]</a>

                    <h3>
                      <a href='#' class='showcase-title'
                        >$row[description]</a
                      >
                    </h3>

                    <div class='showcase-rating'>
                      <ion-icon name='star'></ion-icon>
                      <ion-icon name='star'></ion-icon>
                      <ion-icon name='star'></ion-icon>
                      <ion-icon name='star-outline'></ion-icon>
                      <ion-icon name='star-outline'></ion-icon>
                    </div>

                    <div class='price-box'>
                      <p class='price'>$$row[discount_price]</p>
                      <del>$$row[price]</del>
                    </div>
                  </div>
                </div>";

                }

                

              

                ?>

                
              </div>
            </div>
</div>



<script src="assets/js/jquery-3.6.4.js"></script>
    <script>
        $(document).ready(function(){
            var succesmessage = $("#successmessage").hide();
            var errormessage = $("#errormessage").hide();
            $(document).on("click", "#cartaction", function()
            {

                var product_id = $(this).data("id");
               
                $.ajax({
                    type: "POST",
                    url: "insertcart.php",
                    data: {id:product_id},
                    success: function (data) {
                        if(data==1)
                        {
                          var succesmessage = $("#successmessage").show();
                            $("#successmessage").html("Successfully Saved").slideDown();
                            $("#errormessage").html("Not Saved").slideUp();

                        } else{
                            var errormessage = $("#errormessage").show();
                            $("#errormessage").html("Already Taken In Cart").slideDown();
                            $("#successmessage").html("Successfully Saved").slideUp();
                           
                        }
                    }
                });
            
            });

           

           

            
        })
    </script>