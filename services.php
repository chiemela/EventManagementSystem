<?php
// start session
session_start();
$cart_items_count = 0;
$first_name = "";
$item_id_1 = "1";
$item_id_2 = "2";
$item_id_3 = "3";
$item_id_4 = "4";
$item_id_5 = "5";
$item_id_6 = "6";
$item_id_7 = "7";
$item_id_8 = "8";
$item_id_9 = "9";
$sending_url = "&sending_url=services.php#";
$cart_argument = "&cart_argument=SET";
function redirect_to_booking_page(){
   // Redirect user to welcome page
   header("location: ./booking.php");
}
// get cart item
if(!empty($_SESSION["cart_items"])){
   $cart_items = $_SESSION["cart_items"];
   $cart_error = $_SESSION["cart_error"];
   if($cart_error === "YES"){
      $error_item_id = $_SESSION["item_id"];
   }
   $cart_items = explode(",", $cart_items);
   array_pop($cart_items);
   $cart_items_count = count($cart_items);
}
?>



<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- site metas -->
      <title>Services | Better Than At Home</title>
      
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
               <div class="col-md-4" id="<?php echo $item_id_1;?>">
                  <div class="img_box">
                     <figure><img src="images/img9.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <?php
                     if(!empty($error_item_id)){
                        if($error_item_id == "1"){
                           echo '
                              <p style="color:red;">This item is already in the Cart</p>
                           ';
                        }
                     }
                  ?>
                  <p>Vegetable Plate</p>
                  <p style="margin-top:-10px;">£20.50</p>
                  <a href="./cart_manager.php?id=<?php echo $item_id_1.$cart_argument.$sending_url.$item_id_1;?>" class="book_btn mt-0 mb-5">Add to Cart <i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
               </div>
               <div class="col-md-4" id="<?php echo $item_id_2;?>">
                  <div class="img_box">
                     <figure><img src="images/img10.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <?php
                     if(!empty($error_item_id)){
                        if($error_item_id == "2"){
                           echo '
                              <p style="color:red;">This item is already in the Cart</p>
                           ';
                        }
                     }
                  ?>
                  <p>Vegan Salad Bowl</p>
                  <p style="margin-top:-10px;">£15.75</p>
                  <a href="./cart_manager.php?id=<?php echo $item_id_2.$cart_argument.$sending_url.$item_id_2;?>" class="book_btn mt-0 mb-5">Add to Cart <i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
               </div>
               <div class="col-md-4" id="<?php echo $item_id_3;?>">
                  <div class="img_box">
                     <figure><img src="images/img11.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <?php
                     if(!empty($error_item_id)){
                        if($error_item_id == "3"){
                           echo '
                              <p style="color:red;">This item is already in the Cart</p>
                           ';
                        }
                     }
                  ?>
                  <p>Cauliflower</p>
                  <p style="margin-top:-10px;">£35.10</p>
                  <a href="./cart_manager.php?id=<?php echo $item_id_3.$cart_argument.$sending_url.$item_id_3;?>" class="book_btn mt-0 mb-5">Add to Cart <i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4" id="<?php echo $item_id_4;?>">
                  <div class="img_box">
                     <figure><img src="images/img12.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <?php
                     if(!empty($error_item_id)){
                        if($error_item_id == "4"){
                           echo '
                              <p style="color:red;">This item is already in the Cart</p>
                           ';
                        }
                     }
                  ?>
                  <p>Vegan Guacamole</p>
                  <p style="margin-top:-10px;">£15.50</p>
                  <a href="./cart_manager.php?id=<?php echo $item_id_4.$cart_argument.$sending_url.$item_id_4;?>" class="book_btn mt-0 mb-5">Add to Cart <i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
               </div>
               <div class="col-md-4" id="<?php echo $item_id_5;?>">
                  <div class="img_box">
                     <figure><img src="images/img13.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <?php
                     if(!empty($error_item_id)){
                        if($error_item_id == "5"){
                           echo '
                              <p style="color:red;">This item is already in the Cart</p>
                           ';
                        }
                     }
                  ?>
                  <p>Avacado Toast</p>
                  <p style="margin-top:-10px;">£28.35</p>
                  <a href="./cart_manager.php?id=<?php echo $item_id_5.$cart_argument.$sending_url.$item_id_5;?>" class="book_btn mt-0 mb-5">Add to Cart <i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
               </div>
               <div class="col-md-4" id="<?php echo $item_id_6;?>">
                  <div class="img_box">
                     <figure><img src="images/img14.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <?php
                     if(!empty($error_item_id)){
                        if($error_item_id == "6"){
                           echo '
                              <p style="color:red;">This item is already in the Cart</p>
                           ';
                        }
                     }
                  ?>
                  <p>Roasted Vegetables</p>
                  <p style="margin-top:-10px;">£24.50</p>
                  <a href="./cart_manager.php?id=<?php echo $item_id_6.$cart_argument.$sending_url.$item_id_6;?>" class="book_btn mt-0 mb-5">Add to Cart <i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4" id="<?php echo $item_id_7;?>">
                  <div class="img_box">
                     <figure><img src="images/img15.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <?php
                     if(!empty($error_item_id)){
                        if($error_item_id == "7"){
                           echo '
                              <p style="color:red;">This item is already in the Cart</p>
                           ';
                        }
                     }
                  ?>
                  <p>Vegan Veggie Bowl</p>
                  <p style="margin-top:-10px;">£21.99</p>
                  <a href="./cart_manager.php?id=<?php echo $item_id_7.$cart_argument.$sending_url.$item_id_7;?>" class="book_btn mt-0 mb-5">Add to Cart <i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
               </div>
               <div class="col-md-4" id="<?php echo $item_id_8;?>">
                  <div class="img_box">
                     <figure><img src="images/img16.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <?php
                     if(!empty($error_item_id)){
                        if($error_item_id == "8"){
                           echo '
                              <p style="color:red;">This item is already in the Cart</p>
                           ';
                        }
                     }
                  ?>
                  <p>Greek Salad</p>
                  <p style="margin-top:-10px;">£27.00</p>
                  <a href="./cart_manager.php?id=<?php echo $item_id_8.$cart_argument.$sending_url.$item_id_8;?>" class="book_btn mt-0 mb-5">Add to Cart <i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
               </div>
               <div class="col-md-4" id="<?php echo $item_id_9;?>">
                  <div class="img_box">
                     <figure><img src="images/img17.jpg" alt="#" class="rounded"/></figure>
                  </div>
                  <?php
                     if(!empty($error_item_id)){
                        if($error_item_id == "9"){
                           echo '
                              <p style="color:red;">This item is already in the Cart</p>
                           ';
                        }
                     }
                  ?>
                  <p>Porridge</p>
                  <p style="margin-top:-10px;">£11.50</p>
                  <a href="./cart_manager.php?id=<?php echo $item_id_9.$cart_argument.$sending_url.$item_id_9;?>" class="book_btn mt-0 mb-5">Add to Cart <i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
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

