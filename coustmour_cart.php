<?php
    include "conn.php";
    session_start();
    $no = $_SESSION['sno'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>lighten</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">


    <title>cart page</title>
  </head>
  <body>
      <!-- header --> 
      <?php
        include '_header.php';
      ?>
      <!-- header end --> 

    <div class="container">
    <div class="row">
        <div class="col"> 
        <h1 class="display-4 my-4" >Shoping cart</h1>
        </div>
        <div class="col">
        </div>
        <div class="w-100"></div>
        <?php
          $order = "SELECT * FROM `orders` WHERE Customer_id = '$no'";
          $res = mysqli_query($conn, $order)or die('querry failed');
          while($data = mysqli_fetch_assoc($res)){
            $o_sno=$data['sno'];
            $product_no = $data['product_no'];
            $img = "SELECT * FROM `img` WHERE sno = '$product_no' ";
            $result= mysqli_query($conn, $img);
            while($DATA = mysqli_fetch_assoc($result)){
              $img = $DATA['img_name'];
              $p_name = $DATA['p_name'];
              $p_price = $DATA['p_price'];
              $p_q = $DATA['p_q'];
              $p_detail = $DATA['pro_detail'];
              echo '  <div class="row col-12 my-5">
              <div class="col">
              <img src="images/'.$img.'" width="300" height="300" class="rounded float-left" alt="..." />
              </div>
              <div class="col">
              <h2>'.$p_name.'</h2>
              <div class="product-details">
              <div class="product-title">'.$p_detail.'</div>
              <p class="product-description">Pen-drive where you can save your data as the pendrive</p>
              </div>
              <h1 class="product-price">'.$p_price.'</h1>
              <div class="product-quantity">
              <input type="number" value="1" min="1">
              </div>
              <div class="product-removal">
              <button class="dlt_btn" data-id='.$o_sno.' >Remove</button> 
              </div>
              <h1>price of number of items</h1>
              <h2 class="product-line-price">'.$p_price.'</h2>
              <hr>
          </div>
          </div>';

          }
          }
        ?>
    </div>
    <hr>
<!-- pricing detales of all -->
<div class="container my-4">
  <div class="row">
    <div class="col-4 totals-item" >
    <h1>Subtotal</h1>
      <div class="totals-value" id="cart-subtotal">71.97</div>
    </div>
    <div class="col-4">
    <h1>Tax (5%)</h1>
      <div class="totals-value" id="cart-tax">3.60</div>
    </div>
    <div class="col-4">
    <h1>Shipping</h1>
      <div class="totals-value" id="cart-shipping">15.00</div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <h1>Grand Total</h1>
      <div class="totals-value" id="cart-total">90.57</div>
    </div>
    <div class="col-4">
    </div>
    <div class="col-4">
    <button type="button" class="btn btn-outline-success my-4">cheakout</button>
  </div>
    </div>
  </div>
  </div>
    </div>


<!-- end of pricing details -->
<!-- jquery CDN path -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
  /* Set rates + misc */
var taxRate = 0.05;
var shippingRate = 15.00; 
var fadeTime = 300;


/* Assign actions */
// $('.product-quantity input').change( function() {
//   updateQuantity(this);
// });

// $('.product-removal button').click( function() {
//   removeItem(this);
// });



/* Recalculate cart */
// function recalculateCart()
// {
//   var subtotal = 0;
  
//   /* Sum up row totals */
//   $('.product').each(function () {
//     subtotal += parseFloat($(this).children('.product-line-price').text());
//   });
  
//   /* Calculate totals */
//   var tax = subtotal * taxRate;
//   var shipping = (subtotal > 0 ? shippingRate : 0);
//   var total = subtotal + tax + shipping;
  
//   /* Update totals display */
//   $('.totals-value').fadeOut(fadeTime, function() {
//     $('#cart-subtotal').html(subtotal.toFixed(2));
//     $('#cart-tax').html(tax.toFixed(2));
//     $('#cart-shipping').html(shipping.toFixed(2));
//     $('#cart-total').html(total.toFixed(2));
//     if(total == 0){
//       $('.checkout').fadeOut(fadeTime);
//     }else{
//       $('.checkout').fadeIn(fadeTime);
//     }
//     $('.totals-value').fadeIn(fadeTime);
//   });
// }


/* Update quantity */
// function updateQuantity(quantityInput)
// {
//   /* Calculate line price */
//   var productRow = $(quantityInput).parent().parent();
//   var price = parseFloat(productRow.children('.product-price').text());
//   var quantity = $(quantityInput).val();
//   var linePrice = price * quantity;
  
//   /* Update line price display and recalc cart totals */
//   productRow.children('.product-line-price').each(function () {
//     $(this).fadeOut(fadeTime, function() {
//       $(this).text(linePrice.toFixed(2));
//       recalculateCart();
//       $(this).fadeIn(fadeTime);
//     });
//   });  
// }


// /* Remove item from cart */
// function removeItem(removeButton)
// {
//   /* Remove row from DOM and recalc cart total */
//   var productRow = $(removeButton).parent().parent();
//   productRow.slideUp(fadeTime, function() {
//     productRow.remove();
//     recalculateCart();
//   });
}
</script>
    <!-- footer -->
    <?php
    include 'admin/_footer.php'
    ?>   
    <!-- footer end -->
    <!-- Javascript files--> 
    <script src="js/jquery.min.js"></script> 
      <script src="js/popper.min.js"></script> 
      <script src="js/bootstrap.bundle.min.js"></script> 
      <script src="js/jquery-3.0.0.min.js"></script> 
      <script src="js/plugin.js"></script> 
      <!-- sidebar --> 
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script> 
      <script src="js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
        $(document).ready(function(){
        $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
        });
        $(".zoom").hover(function(){
        
        $(this).addClass('transition');
        }, function(){

        $(this).removeClass('transition');
        });
        });

        $(document).on("click", ".dlt_btn", function(){
          var o_id = $(this).data("id");
          console.log(o_id);
          $.ajax({
            url:"admin/_handleRemoveProduct.php",
            type : "POST",
            data : {id:o_id},
            success : function(data){
              if(data==1){
                alert('okkk');
              }else{
                alert('fuck');
              }

            }
          })
        });
      </script>
  </body>
</html>








 
        
