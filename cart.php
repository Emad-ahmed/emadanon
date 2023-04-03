<?php include "navbar.php" ?>
<link rel="stylesheet" href="assets/css/cart.css">
<link rel="stylesheet" href="assets/css/login.css">

<div id="successmessage">
   
</div>

<div id="errormessage">
   
</div>

<div class="container mycontain">
<main class="cart">
<div class='basket'>
      
      <div class='basket-labels'>
        <ul>
          <li class='item item-heading'>Item</li>
          <li class='price'>Price</li>
          <li class='quantity'>Quantity</li>
          <li class='subtotal'>Subtotal</li>
        </ul>
      </div>
<?php

include 'config.php';


$email = $_SESSION['email'];

$datafetchquery = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'");
$data = mysqli_fetch_array($datafetchquery);
$user_id = $data['id'];

$alldata = mysqli_query($conn, "SELECT * FROM user, cart, product WHERE cart.user_id = '$user_id'");

while ($row = mysqli_fetch_array($alldata)) {

    echo "
      <div class='basket-product'>
        <div class='item'>
          <div class='product-image'>
            <img src='$row[image]' alt='Placholder Image 2' class='product-frame'>
          </div>
          <div class='product-details'>
            <h1><strong><span class='item-quantity'>1</span> x $row[title]</strong> $row[description]</h1>
            <p><strong>$row[title]</strong></p>
            <p>Product Code - $row[product_code]</p>
          </div>
        </div>
        <div class='price'>$row[price]</div>
        <div class='quantity'>
          <input type='number' value='1' min='1' class='quantity-field'>
        </div>
        <div class='subtotal'>$row[price]</div>
        <div>
          <button data-id='$row[id]' class='delete_btn'>Remove</button>
        </div>
      </div>
     
    ";

}

    ?>
</div>

    <aside>
      <div class="summary">
        <div class="summary-total-items"><span class="total-items"></span> Items in your Bag</div>
        <div class="summary-subtotal">
          <div class="subtotal-title">Subtotal</div>
          <div class="subtotal-value final-value" id="basket-subtotal"></div>
          <div class="summary-promo hide">
            <div class="promo-title">Promotion</div>
            <div class="promo-value final-value" id="basket-promo"></div>
          </div>
        </div>
        <div class="summary-delivery">
          <select name="delivery-collection" class="summary-delivery-selection">
            <option value="0" selected="selected">Select Collection or Delivery</option>
            <option value="collection">Collection</option>
            <option value="first-class">Royal Mail 1st Class</option>
            <option value="second-class">Royal Mail 2nd Class</option>
            <option value="signed-for">Royal Mail Special Delivery</option>
          </select>
        </div>
        <div class="summary-total">
          <div class="total-title">Total</div>
          <div class="total-value final-value" id="basket-total"></div>
        </div>
        <div class="summary-checkout">
          <a href="checkout.php"  class="checkout-cta">Go to Secure Checkout</a>
        </div>
      </div>
    </aside>
  </main>

  </div>


<script src="assets/js/jquery-3.6.4.js"></script>

  <script>
    /* Set values + misc */
var promoCode;
var promoPrice;
var fadeTime = 300;

/* Assign actions */
$(".quantity input").change(function () {
  updateQuantity(this);
});

$(".remove button").click(function () {
  removeItem(this);
});

$(document).ready(function () {
  updateSumItems();
});

$(".promo-code-cta").click(function () {
  promoCode = $("#promo-code").val();
  if (promoCode == "10off" || promoCode == "10OFF") {
    //If promoPrice has no value, set it as 10 for the 10OFF promocode
    if (!promoPrice) {
      promoPrice = 10;
    } else if (promoCode) {
      promoPrice = promoPrice * 1;
    }
  } else if (promoCode != "") {
    alert("Invalid Promo Code");
    promoPrice = 0;
  }
  //If there is a promoPrice that has been set (it means there is a valid promoCode input) show promo
  if (promoPrice) {
    $(".summary-promo").removeClass("hide");
    $(".promo-value").text(promoPrice.toFixed(2));
    recalculateCart(true);
  }
});

/* Recalculate cart */
function recalculateCart(onlyTotal) {
  var subtotal = 0;

  /* Sum up row totals */
  $(".basket-product").each(function () {
    subtotal += parseFloat($(this).children(".subtotal").text());
  });

  /* Calculate totals */
  var total = subtotal;

  //If there is a valid promoCode, and subtotal < 10 subtract from total
  var promoPrice = parseFloat($(".promo-value").text());
  if (promoPrice) {
    if (subtotal >= 10) {
      total -= promoPrice;
    } else {
      alert("Order must be more than £10 for Promo code to apply.");
      $(".summary-promo").addClass("hide");
    }
  }

  /*If switch for update only total, update only total display*/
  if (onlyTotal) {
    /* Update total display */
    $(".total-value").fadeOut(fadeTime, function () {
      $("#basket-total").html(total.toFixed(2));
      $(".total-value").fadeIn(fadeTime);
    });
  } else {
    /* Update summary display. */
    $(".final-value").fadeOut(fadeTime, function () {
      $("#basket-subtotal").html(subtotal.toFixed(2));
      $("#basket-total").html(total.toFixed(2));
      if (total == 0) {
        $(".checkout-cta").fadeOut(fadeTime);
      } else {
        $(".checkout-cta").fadeIn(fadeTime);
      }
      $(".final-value").fadeIn(fadeTime);
    });
  }
}

/* Update quantity */
function updateQuantity(quantityInput) {
  /* Calculate line price */
  var productRow = $(quantityInput).parent().parent();
  var price = parseFloat(productRow.children(".price").text());
  var quantity = $(quantityInput).val();
  var linePrice = price * quantity;
  
  /* Update line price display and recalc cart totals */
  productRow.children(".subtotal").each(function () {
    $(this).fadeOut(fadeTime, function () {
      $(this).text(linePrice.toFixed(2));
      recalculateCart();
      $(this).fadeIn(fadeTime);
    });
  });

  productRow.find(".item-quantity").text(quantity);
  updateSumItems();

  console.log(productRow);
  
}

function updateSumItems() {
  var sumItems = 0;
  $(".quantity input").each(function () {
    sumItems += parseInt($(this).val());
  
  });
  $(".total-items").text(sumItems);
 
  return sumItems;
}

/* Remove item from cart */
function removeItem(removeButton) {
  /* Remove row from DOM and recalc cart total */
  var productRow = $(removeButton).parent().parent();
  var cart_id = $(this).data("id");
  productRow.slideUp(fadeTime, function () {
    $.ajax({
      type: "POST",
      url: "deletecart.php",
      data: {id:cart_id},
     
      success: function (response) {
        if(data==1)
                {
                productRow.remove();
                recalculateCart();
                updateSumItems();
                var succesmessage = $("#successmessage").show();
                $("#successmessage").html("Successfully Deleted").slideDown();
                $("#errormessage").html("Not delete").slideUp();
        }else{
              var errormessage = $("#errormessage").show();
              $("#errormessage").html("Not Delte").slideDown();
              $("#successmessage").html("Successfully Saved").slideUp();
          }
      }
    });
    
  });
  

  
}



$(document).ready(function(){


  $(document).on("click", ".delete-btn", function()
            {
                if(confirm("Do you really want to delete this data"))
                {
                var student_id = $(this).data("id");
                var element = this;
            
                $.ajax({
                    type: "POST",
                    url: "deletedata.php",
                    data: {id:student_id},
                    success: function (data) {
                        if(data==1)
                        {
                            $(element).closest("tr").fadeOut();
                            $("#successmessage").html("Successfully Deleted").slideDown();
                            $("#errormessage").html("Not delete").slideUp();
                           
                            loaddata();
                        } else{
                            $("#errormessage").html("Not Delte").slideDown();
                            $("#successmessage").html("Successfully Saved").slideUp();
                        }
                    }
                });
            };
            });

}

var value = updateSumItems();
console.log(value);
var valuequan = updateQuantity();
console.log(valuequan);



</script>