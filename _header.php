<?php
include 'conn.php';
include '_singup_modal.php';
include '_loginModal.php';
 ?>
 <!-- header -->
   <header>
 <!-- header inner -->
 <div class="header">
    <div class="head_top">
       <div class="container">
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
               <div class="top-box">
                <ul class="sociel_link">
                 <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                 <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                 <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                 <li> <a href="#"><i class="fa fa-linkedin"></i></a></li>
             </ul>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
               <div class="top-box">
               <?php
               if (isset($_SESSION['login']) && $_SESSION['login'] == true){
                  echo '<p>Welcome '.$_SESSION['user_name'].'</p> ';
               }else{
                  echo '<p>login for better experience</p>';
               }
               ?>
            </div>
          </div>
       </div>
    </div>
 </div>
 <div class="container">
    <div class="row">
       <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
          <div class="full">
             <div class="center-desk">
                <div class="logo"> <a href="index.html"><img src="images/logo.jpg" alt="logo"/></a> </div>
                

             </div>
          </div>
       </div>
       <div class="col-xl-7 col-lg-7 col-md-9 col-sm-9">
          <div class="menu-area">
             <div class="limit-box">
                <nav class="main-menu">
                   <ul class="menu-area-main">
                      <li > <a href="index.php">Home</a> </li>
                      <li> <a href="about.php">About</a> </li>
                      <li > <a href="#">product</a> </li>
                      <li> <a href="contact.php">Contact</a> </li>
                      <li> <a href="coustmour_cart.php">Cart <i style="font-size:24px" class="fa">&#xf07a;</i></a> </li>

<?php
if (isset($_SESSION['login']) && $_SESSION['login'] == true){
   echo '<li><a class="buy"  href="_logout.php">logout</a></li>';
}else{
   echo '<li class="mean-last" data-toggle="modal" data-target="#signupModal"> <a href="#contact">signup</a> </li>
</ul>
</nav>
</div>
</div>
</div>
<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
<li  data-toggle="modal" data-target="#loginModal" ><a class="buy"  href="#">Login</a></li>';
} 
?>

</div>
</div>
</div>

<!-- end header inner -->

</header>
<!-- end header -->
            