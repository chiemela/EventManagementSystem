<?php
// start session
session_start();
$cart_items_count = 3;
$first_name = "";
function redirect_to_booking_page(){
   // Redirect user to welcome page
   header("location: ./booking.php");
}
?>



<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Services | Better Than At Home</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- favicon -->
      <link rel="icon" href="images/logo2.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link href="css/sb-admin-2.min.css" rel="stylesheet">
      <link href="css/sb-admin-2.css" rel="stylesheet">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <style>
      .nav-horizontal-line {
         border:none;
         height: 20px;
         width: 80%;
         height: 50px;
         margin-top: -10px;
         border-bottom: 1px solid #CDCCCC;
         box-shadow: 0 20px 20px -20px #333;
         margin-bottom: 150px;
      }
      .footer-horizontal-line {
         border:none;
         width: 100%;
         border-top: 1px solid #CDCCCC;
      }
   </style>
   <!-- body -->
   <body class="main-layout">
      <!-- end loader -->
      <!-- header -->
      <?php
         $page = "OTHER";
         include "./header.php";
      ?>
      <!-- end header inner -->
      <!-- end header -->
      <!-- form_lebal -->
      <section>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <form class="form_book">
                     <div class="titlepage">
                        <h2><span class="text_norlam">Choose The Perfect Vegan</span> Meal</h2>
                        <div class="copyright" style="margin-bottom:-120px;">
                           <p style="margin-top:-50px;">Available Dishes</p>
                           <a href="./booking.php" class="book_btn" style="margin-top:-50px; margin-bottom:-250px; color:white;" >Book Now</a>
                        </div>
                     </div>
                     <br/>
                  </form>
               </div>
            </div>
         </div>
      </section>
      <!-- end form_lebal -->
      <!-- our services -->
      <div class="our">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="img_box">
                     <figure><img src="images/img9.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <p>Vegetable Plate</p>
                  <p style="margin-top:-10px;">£20.50</p>
                  <button class="book_btn mt-0 mb-5">Add to Cart</button>
               </div>
               <div class="col-md-4">
                  <div class="img_box">
                     <figure><img src="images/img10.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <p>Vegan Salad Bowl</p>
                  <p style="margin-top:-10px;">£15.75</p>
                  <button class="book_btn mt-0 mb-5">Add to Cart</button>
               </div>
               <div class="col-md-4">
                  <div class="img_box">
                     <figure><img src="images/img11.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <p>Cauliflower</p>
                  <p style="margin-top:-10px;">£35.10</p>
                  <button class="book_btn mt-0 mb-5">Add to Cart</button>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="img_box">
                     <figure><img src="images/img12.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <p>Vegan Guacamole</p>
                  <p style="margin-top:-10px;">£15.50</p>
                  <button class="book_btn mt-0 mb-5">Add to Cart</button>
               </div>
               <div class="col-md-4">
                  <div class="img_box">
                     <figure><img src="images/img13.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <p>Avacado Toast</p>
                  <p style="margin-top:-10px;">£28.35</p>
                  <button class="book_btn mt-0 mb-5">Add to Cart</button>
               </div>
               <div class="col-md-4">
                  <div class="img_box">
                     <figure><img src="images/img14.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <p>Roasted Vegetables</p>
                  <p style="margin-top:-10px;">£24.50</p>
                  <button class="book_btn mt-0 mb-5">Add to Cart</button>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="img_box">
                     <figure><img src="images/img15.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <p>Vegan Veggie Bowl</p>
                  <p style="margin-top:-10px;">£21.99</p>
                  <button class="book_btn mt-0 mb-5">Add to Cart</button>
               </div>
               <div class="col-md-4">
                  <div class="img_box">
                     <figure><img src="images/img16.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <p>Greek Salad</p>
                  <p style="margin-top:-10px;">£27.00</p>
                  <button class="book_btn mt-0 mb-5">Add to Cart</button>
               </div>
               <div class="col-md-4">
                  <div class="img_box">
                     <figure><img src="images/img17.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <p>Porridge</p>
                  <p style="margin-top:-10px;">£11.50</p>
                  <button class="book_btn mt-0 mb-5">Add to Cart</button>
               </div>
            </div>
         </div>
      </div>
      <!-- end our services -->
      <!--  footer -->
      <footer id="contact">
         <div class="">
            <div class="copyright">
               <div class="container">
                  <div class="row footer-horizontal-line">
                     <div class="col-md-12">
                        <p class="mt-2">Copyright 2022 Better Than At Home. All Right Reserved.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
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
   </body>
</html>

