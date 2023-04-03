<?php include 'navbar.php'  ?>


<div id="successmessage">
   
</div>

<div id="errormessage">
   
</div>


<link rel="stylesheet" href="assets/css/login.css">



<div class="container">
    
        <form  class="sign-form" id="sign-form">
            <h1 class="form-title ">Add Product</h1>
            <br>
            <label for="title">Title<span class="star-required">*</span></label>
            <input type="text" name="title" id="title" placeholder="Title" autofocus required>
            <p class="mt-0 errorp" id="nerror"></p>

            <label for="description">Description<span class="star-required">*</span></label>
            <textarea name="description" id="description" cols="30" rows="10" required></textarea>
            <p class="mt-0 errorp" id="eerror"></p>

            <label for="price">Price<span class="star-required">*</span></label>
            <input type="number" name="price" id="price" placeholder="Price" required>
            <p class="mt-0 errorp" id="merror"></p>

            <label for="desprice">Discount Price<span class="star-required">*</span></label>
            <input type="number" name="desprice" id="desprice" placeholder="Discount Price" required>
            <p class="mt-0 errorp" id="perror"></p>

            <label for="desprice">Discount<span class="star-required">*</span></label>
            <input type="number" name="discount" id="discount" placeholder="Discount" required>
            <p class="mt-0 errorp" id="perror"></p>

            <label for="prodcode">Product Code<span class="star-required">*</span></label>
            <input type="text" name="prodcode" id="prodcode" placeholder="Product Code" required>
            <p class="mt-0 errorp" id="perror"></p>
            
            <label for="desprice">Category<span class="star-required" >*</span></label>
            <select class="form-select" aria-label="Default select example" name="category">
            <option value="electronics">Electronics</option>
            <option value="desktop">Desktop</option>
            <option value="dress">Dress</option>
            <option value="camera">Camera</option>
            <option value="headphone">Headphone</option>
            <option value="dress">Dress</option>
            </select>

            <label for="fimage">Front Image<span class="star-required">*</span></label>
            <input type="file" name="fimage" id="fimage" style="padding-top:0.5rem;" required>
            <p class="mt-0 errorp" id="perror"></p>
            

            <label for="bimage">Back Image<span class="star-required">*</span></label>
            <input type="file" name="bimage" id="bimage" style="padding-top:0.5rem;" required>
            <p class="mt-0 errorp" id="perror"></p>

            <br>

        
            <input type="submit" name="signup" id="submit-form" value="Add Product">

         
           
        </form>
    </div>


<script src="assets/js/jquery-3.6.4.js"></script>

<script>
    $(document).ready(function()
    {
        $(document).ready(function() {
                var succesmessage = $("#successmessage").hide();
                var errormessage = $("#errormessage").hide();
                $('#submit-form').on('click', function(e) {
                    e.preventDefault();
                    
                    var title = $("#title").val();
                    var description = $("#description").val();
                    var price = $("#price").val();
                    var desprice = $("#desprice").val();
                    var category = $("#category").val();
                    var prodcode = $("#prodcode").val();
                    var form = $('#sign-form')[0];
                    var formData = new FormData(form);

                    if(title == "" || description == "" || price == "" || desprice == "" || category == "" || prodcode == "")
                    {
                        
                        $("#errormessage").html("Please Full Fill The Required Field").slideDown();
                        var errormessage = $("#errormessage").show();
                        $("#successmessage").html("Successfully Saved").slideUp();
                        $('html, body').animate({
                                scrollTop: $("#myhead").offset().top
                            }, 10);
                    } 
                    else{
                        $.ajax({
                        url: 'addproductaction.php',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $("#successmessage").html("Successfully Saved").slideDown();
                            var succesmessage = $("#successmessage").show();
                            $("#errormessage").html("Not delete").slideUp();
                            $('html, body').animate({
                                scrollTop: $("#myhead").offset().top
                            }, 10);
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            $("#successmessage").html("Not Saved").slideUp();
                            var errormessage = $("#errormessage").show();
                            $("#errormessage").html(errorThrown).slideDown();
                            $('html, body').animate({
                                scrollTop: $("#myhead").offset().top
                            }, 10);
                        }
                    });
                    }
                    
                });
            });
    });
</script>

<script src="validationproduct.js" ></script>