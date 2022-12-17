<?php
/*
if(!empty($_COOKIE['myjavascriptVar'])){
    echo $myphpVar = $_COOKIE['myjavascriptVar'];
}
*/
// start session
session_start();
$cart_items_count = 0;
$first_name = "";
// item ID
$item_id_1 = "1";
$item_id_2 = "2";
$item_id_3 = "3";
$item_id_4 = "4";
$item_id_5 = "5";
$item_id_6 = "6";
$item_id_7 = "7";
$item_id_8 = "8";
$item_id_9 = "9";

// item cost
$item_cost_1 = 20.50;
$item_cost_2 = 15.75;
$item_cost_3 = 35.10;
$item_cost_4 = 15.50;
$item_cost_5 = 28.35;
$item_cost_6 = 24.50;
$item_cost_7 = 21.99;
$item_cost_8 = 27.00;
$item_cost_9 = 11.50;

$sending_url = "&sending_url=booking.php";
$cart_argument = "&cart_argument=REMOVE";

// get cart item
if(!empty($_SESSION["cart_items"])){
   $cart_items = $_SESSION["cart_items"];
   $cart_items = explode(",", $cart_items);
   array_pop($cart_items);
   $cart_items_count = count($cart_items);
}
?>



<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- site metas -->
      <title>Booking | Better Than At Home</title>
      
      <?php
         $page = "OTHER";
         include "./css_link_and_meta.php";
      ?>

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
                     <?php
                        // check if the cart items are empty
                        if(!empty($_SESSION["cart_items"])){
                           // check if selected item is already in the cart
                           $item_id = "1";
                           if(strpos($_SESSION["cart_items"], $item_id) !== false){
                              $item_url = $item_id_1.$cart_argument.$sending_url;
                              echo '
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
                                                   <p style="margin-top:-10px;">£';echo $item_cost_1; echo'</p>
                                                   <a href="./cart_manager.php?id=';echo $item_url; echo'" class="book_btn mt-0 mb-5">Remove Item <i class="fa fa-trash"></i></a>
                                                </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              ';
                           }
                           $item_id = "2";
                           if(strpos($_SESSION["cart_items"], $item_id) !== false){
                              $item_url = $item_id_2.$cart_argument.$sending_url;
                              echo '
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
                                                   <a href="./cart_manager.php?id=';echo $item_url; echo'" class="book_btn mt-0 mb-5">Remove Item <i class="fa fa-trash"></i></a>
                                                </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              ';
                           }
                           $item_id = "3";
                           if(strpos($_SESSION["cart_items"], $item_id) !== false){
                              $item_url = $item_id_3.$cart_argument.$sending_url;
                              echo '
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
                                                   <a href="./cart_manager.php?id=';echo $item_url; echo'" class="book_btn mt-0 mb-5">Remove Item <i class="fa fa-trash"></i></a>
                                                </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              ';
                           }
                           $item_id = "4";
                           if(strpos($_SESSION["cart_items"], $item_id) !== false){
                              $item_url = $item_id_4.$cart_argument.$sending_url;
                              echo '
                                 <!-- Booking page Card  -->
                                 <div class="col-xl-12 col-md-12 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                       <div class="card-body">
                                          <div class="row no-gutters align-items-center">
                                                <div class="col-8 ml-2 mt-3 mb-0">
                                                   <figure><img src="images/img12.jpg" width="200px;" alt="#" class="rounded"/></figure>
                                                </div>
                                                <div class="col mr-4">
                                                   <p>Vegan Guacamole</p>
                                                   <p style="margin-top:-10px;">£15.50</p>
                                                   <a href="./cart_manager.php?id=';echo $item_url; echo'" class="book_btn mt-0 mb-5">Remove Item <i class="fa fa-trash"></i></a>
                                                </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              ';
                           }
                           $item_id = "5";
                           if(strpos($_SESSION["cart_items"], $item_id) !== false){
                              $item_url = $item_id_5.$cart_argument.$sending_url;
                              echo '
                                 <!-- Booking page Card  -->
                                 <div class="col-xl-12 col-md-12 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                       <div class="card-body">
                                          <div class="row no-gutters align-items-center">
                                                <div class="col-8 ml-2 mt-3 mb-0">
                                                   <figure><img src="images/img13.jpg" width="200px;" alt="#" class="rounded"/></figure>
                                                </div>
                                                <div class="col mr-4">
                                                   <p>Avacado Toast</p>
                                                   <p style="margin-top:-10px;">£28.35</p>
                                                   <a href="./cart_manager.php?id=';echo $item_url; echo'" class="book_btn mt-0 mb-5">Remove Item <i class="fa fa-trash"></i></a>
                                                </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              ';
                           }
                           $item_id = "6";
                           if(strpos($_SESSION["cart_items"], $item_id) !== false){
                              $item_url = $item_id_6.$cart_argument.$sending_url;
                              echo '
                                 <!-- Booking page Card  -->
                                 <div class="col-xl-12 col-md-12 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                       <div class="card-body">
                                          <div class="row no-gutters align-items-center">
                                                <div class="col-8 ml-2 mt-3 mb-0">
                                                   <figure><img src="images/img14.jpg" width="200px;" alt="#" class="rounded"/></figure>
                                                </div>
                                                <div class="col mr-4">
                                                   <p>VRoasted Vegetables</p>
                                                   <p style="margin-top:-10px;">£24.50</p>
                                                   <a href="./cart_manager.php?id=';echo $item_url; echo'" class="book_btn mt-0 mb-5">Remove Item <i class="fa fa-trash"></i></a>
                                                </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              ';
                           }
                           $item_id = "7";
                           if(strpos($_SESSION["cart_items"], $item_id) !== false){
                              $item_url = $item_id_7.$cart_argument.$sending_url;
                              echo '
                                 <!-- Booking page Card  -->
                                 <div class="col-xl-12 col-md-12 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                       <div class="card-body">
                                          <div class="row no-gutters align-items-center">
                                                <div class="col-8 ml-2 mt-3 mb-0">
                                                   <figure><img src="images/img15.jpg" width="200px;" alt="#" class="rounded"/></figure>
                                                </div>
                                                <div class="col mr-4">
                                                   <p>Vegan Veggie Bowl</p>
                                                   <p style="margin-top:-10px;">£21.99</p>
                                                   <a href="./cart_manager.php?id=';echo $item_url; echo'" class="book_btn mt-0 mb-5">Remove Item <i class="fa fa-trash"></i></a>
                                                </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              ';
                           }
                           $item_id = "8";
                           if(strpos($_SESSION["cart_items"], $item_id) !== false){
                              $item_url = $item_id_8.$cart_argument.$sending_url;
                              echo '
                                 <!-- Booking page Card  -->
                                 <div class="col-xl-12 col-md-12 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                       <div class="card-body">
                                          <div class="row no-gutters align-items-center">
                                                <div class="col-8 ml-2 mt-3 mb-0">
                                                   <figure><img src="images/img16.jpg" width="200px;" alt="#" class="rounded"/></figure>
                                                </div>
                                                <div class="col mr-4">
                                                   <p>Greek Salad</p>
                                                   <p style="margin-top:-10px;">£27.00</p>
                                                   <a href="./cart_manager.php?id=';echo $item_url; echo'" class="book_btn mt-0 mb-5">Remove Item <i class="fa fa-trash"></i></a>
                                                </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              ';
                           }
                           $item_id = "9";
                           if(strpos($_SESSION["cart_items"], $item_id) !== false){
                              $item_url = $item_id_9.$cart_argument.$sending_url;
                              echo '
                                 <!-- Booking page Card  -->
                                 <div class="col-xl-12 col-md-12 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                       <div class="card-body">
                                          <div class="row no-gutters align-items-center">
                                                <div class="col-8 ml-2 mt-3 mb-0">
                                                   <figure><img src="images/img17.jpg" width="200px;" alt="#" class="rounded"/></figure>
                                                </div>
                                                <div class="col mr-4">
                                                   <p>Porridge</p>
                                                   <p style="margin-top:-10px;">£11.50</p>
                                                   <a href="./cart_manager.php?id=';echo $item_url; echo'" class="book_btn mt-0 mb-5">Remove Item <i class="fa fa-trash"></i></a>
                                                </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              ';
                           }
                        }
                     ?>
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

