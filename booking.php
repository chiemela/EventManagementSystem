<?php
// start session
session_start();
$cart_items_count = 0;
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
                     </div>
                     <br/>
                     <div class="row">
                        <div class="col-md-3">
                           <label class="date">ARRIVAL DATE</label>
                           <input class="book_n"  type="date" >
                        </div>
                        <div class="col-md-3">
                           <label class="date">DEPARTURE DATE</label>
                           <input class="book_n"  type="date" >
                        </div>
                        <div class="col-md-3">
                           <label class="date">PERSON</label>
                           <input class="book_n" placeholder="2" type="type" name="2">
                        </div>
                        <div class="col-md-3">
                           <button class="book_btn">Book Now</button>
                        </div>
                     </div>
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
                     <figure><img src="images/img4.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <p>Name goes here</p>
                  <p style="margin-top:-10px;">£10.50</p>
                  <button class="book_btn mt-0">Add to Cart</button>
               </div>
               <div class="col-md-4">
                  <div class="img_box">
                     <figure><img src="images/img4.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <p>Name goes here</p>
                  <p style="margin-top:-10px;">£10.50</p>
                  <button class="book_btn mt-0">Add to Cart</button>
               </div>
               <div class="col-md-4">
                  <div class="img_box">
                     <figure><img src="images/img4.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <p>Name goes here</p>
                  <p style="margin-top:-10px;">£10.50</p>
                  <button class="book_btn mt-0">Add to Cart</button>
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

