<?php
// start session
session_start();
$cart_items_count = 3;
$first_name = "";
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
      <title>Booking | Better Than At Home</title>
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
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link href="css/sb-admin-2.min.css" rel="stylesheet">
      <link href="css/sb-admin-2.css" rel="stylesheet">
      <!-- other additional links -->
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
                        <h2><span class="text_norlam">Items In Your</span> Cart <i class='fa fa-shopping-cart' aria-hidden='true'></i>
                        </div></h2>
                     </div>
                     <br/>
                     <div class="row">
                        <div class="col-md-3">
                           <label class="date"> DATE</label>
                           <input class="book_n"  type="date" >
                        </div>
                        <div class="col-md-3">
                           <label class="date">TIME</label>
                           <input class="book_n"  type="time" >
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
               <div class="col-xl-8 col-md-8 mb-4">
                  <div class="row">
                     <!-- Booking page Card  -->
                     <div class="col-xl-12 col-md-12 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                           <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                    <div class="col-8 ml-2 mt-3 mb-0">
                                       <figure><img src="images/img9.jpg" width="200px;" alt="#" class="rounded"/></figure>
                                    </div>
                                    <div class="col mr-4">
                                       <p>Vegetable Plate</p>
                                       <p style="margin-top:-10px;">£20.50</p>
                                       <button class="book_btn mt-0 mb-0 pl-4 pr-4">Remove Item</button>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Booking page Card  -->
                     <div class="col-xl-12 col-md-12 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                           <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                    <div class="col-8 ml-2 mt-3 mb-0">
                                       <figure><img src="images/img10.jpg" width="200px;" alt="#" class="rounded"/></figure>
                                    </div>
                                    <div class="col mr-4">
                                       <p>Vegan Salad Bowl</p>
                                       <p style="margin-top:-10px;">£15.75</p>
                                       <button class="book_btn mt-0 mb-0 pl-4 pr-4">Remove Item</button>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Booking page Card  -->
                     <div class="col-xl-12 col-md-12 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                           <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                    <div class="col-8 ml-2 mt-3 mb-0">
                                       <figure><img src="images/img11.jpg" width="200px;" alt="#" class="rounded"/></figure>
                                    </div>
                                    <div class="col mr-4">
                                       <p>Cauliflower</p>
                                       <p style="margin-top:-10px;">£35.10</p>
                                       <button class="book_btn mt-0 mb-0 pl-4 pr-4">Remove Item</button>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-md-4 mb-4">
                  <!-- Checkout -->
                  <div class="card mb-4">
                     <div class="card-header">
                        Checkout
                     </div>
                     <div class="card-body">
                        Card payment and Tax get calculated here
                        <button class="book_btn">Book Now</button>
                     </div>
                  </div>
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
      <script>
 
        // Below code sets format to the
        // datetimepicker having id as
        // datetime
        $('#datetime').datetimepicker({
            format: 'hh:mm:ss a'
        });
    </script>
   </body>
</html>

