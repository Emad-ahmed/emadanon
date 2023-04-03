<?php include "navbar.php" ?>
<link rel="stylesheet" href="assets/css/table.css">
<link rel="stylesheet" href="assets/css/login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    img{
        width:4rem;
        height:4rem;
    }
    .d-flex
    {
        display:flex;
        justify-content:center;
    }
    .d-flex button{
        margin-right: 1rem;
    }
</style>
<div id="successmessage">
   
</div>

<div id="errormessage">
   
</div>
<main role="main" class="main">
<h2>Show Product</h2>
<table data-replace="jtable" id="example" aria-label="JS Datatable" data-locale="en" data-search="true">
            <thead>
                <tr>  
                    <th>Sno.</th>
                    <th>Title</th>
                
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Category</th>
                  
                    <th>Front Image</th>
                    <th>Back Image</th>   
                    <th>Action</th>               
                   
                </tr>
            </thead>
            <tbody>
                <tr> 
                <?php

        include 'config.php';

        $alldata = mysqli_query($conn, "SELECT * FROM `product` ORDER BY ID ASC");

        while ($row = mysqli_fetch_array($alldata)) {
            echo "<tr>
            <td>$row[id]</td>
            <td>$row[title]</td>
            <td>$row[price]</td>
            <td>$row[discount_price]</td>
            <td>$row[category]</td>
        
            <td><img src='$row[front_image]' alt=''></td>
            <td><img src='$row[back_image]' alt=''></td>
            <td><div class='d-flex'> <button href=''><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button> <button class='delete-btn' data-id ='$row[id]'><i class='fa fa-trash-o' aria-hidden='true'></i></button>   </span></td>
            </tr>";
        }

        ?>
                </tr>
            </tbody>
        </table>
        <script src="assets/js/datatable.min.js"></script>

</main>


<script src="assets/js/jquery-3.6.4.js"></script>

<script>
    $(document).ready(function()
    {
        var succesmessage = $("#successmessage").hide();
        var errormessage = $("#errormessage").hide();
        $(document).on("click", ".delete-btn", function()
            {
                if(confirm("Do you really want to delete this data"))
                {
                var student_id = $(this).data("id");
                var element = this;
            
                $.ajax({
                    type: "POST",
                    url: "deleteproduct.php",
                    data: {id:student_id},
                    success: function (data) {
                        if(data==1)
                        {
                            $(element).closest("tr").fadeOut();
                            var succesmessage = $("#successmessage").show();
                            $("#successmessage").html("Successfully Deleted").slideDown();
                            $("#errormessage").html("Not delete").slideUp();
                           
                            
                        } else{
                            var errormessage = $("#errormessage").show();
                            $("#errormessage").html("Not Delte").slideDown();
                            $("#successmessage").html("Successfully Saved").slideUp();
                        }
                    }
                });
            };
            });
    });
</script>
