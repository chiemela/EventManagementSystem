<?php
/*
if(!empty($_COOKIE['getDate'])){
    echo "<br/>".$myphpVar = $_COOKIE['getDate'];
}
*/
// start session
session_start();

try {
   if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(!empty($_POST["date"]) && !empty($_POST["time"]) && !empty($_POST["person"])){
         $get_form_date = $_POST["date"];
         $get_form_time = $_POST["time"];
         $get_form_person = $_POST["person"];
      }
      // Redirect user to welcome page
      header("location: booking.php?date=$get_form_date&time=$get_form_time&person=$get_form_person");
   }else{
      $cart_items_count = 0;
      $first_name = "";
      
      if(!empty($_GET["cart"])){
         $cart = $_GET["cart"];
         $_SESSION["cart_items"] = [];
         $_SESSION["cart_items"] = "";
      }
      
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
      $item_cost_1 = "20.50";
      $item_cost_2 = "15.75";
      $item_cost_3 = "35.10";
      $item_cost_4 = "15.50";
      $item_cost_5 = "28.35";
      $item_cost_6 = "24.50";
      $item_cost_7 = "21.99";
      $item_cost_8 = "27.00";
      $item_cost_9 = "11.50";
      
      // item images
      $item_images_9 = "img9.jpg";
      $item_images_10 = "img10.jpg";
      $item_images_11 = "img11.jpg";
      $item_images_12 = "img12.jpg";
      $item_images_13 = "img13.jpg";
      $item_images_14 = "img14.jpg";
      $item_images_15 = "img15.jpg";
      $item_images_16 = "img16.jpg";
      $item_images_17 = "img17.jpg";
      
      // item names
      $item_names_1 = "Vegetable Plate";
      $item_names_2 = "Vegan Salad Bowl";
      $item_names_3 = "Cauliflower";
      $item_names_4 = "Vegan Guacamole";
      $item_names_5 = "Avacado Toast";
      $item_names_6 = "Roasted Vegetables";
      $item_names_7 = "Vegan Veggie Bowl";
      $item_names_8 = "Greek Salad";
      $item_names_9 = "Porridge";
      
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
   }
} catch (\Throwable $th) {
   // do nothing;
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
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form_book">
                     <div class="titlepage">
                        <h2><span class="text_norlam">Choose The Perfect Vegan</span> Meal</h2>
                        <div class="copyright" style="margin-bottom:-120px;">
                           <p style="margin-top:-50px;">All Available Dishes</p>
                           
                           <div class="row">
                              <div class="col-md-3">
                                 <label class="date"> DATE</label>
                                 <input name="date" class="book_n" id="getDate" type="date" >
                              </div>
                              <div class="col-md-3">
                                 <label class="date">TIME</label>
                                 <input name="time" class="book_n" id="getTime" type="time" >
                              </div>
                              <div class="col-md-3">
                                 <label class="date">PERSON</label>
                                 <input name="person" class="book_n" id="getPerson" placeholder="0" type="type" name="2">
                              </div>
                              <div class="col-md-3">
                                 <button class="book_btn" style="margin-top:30px; margin-bottom:-250px; color:white;" >Book Now</button>
                              </div>
                           </div>
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
                     <figure><img src="images/<?php echo $item_images_9;?>" alt="#" class="rounded"/></figure>
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
                  <p><?php echo $item_names_1;?></p>
                  <p style="margin-top:-10px;">£<?php echo $item_cost_1;?></p>
                  <a href="./cart_manager.php?id=<?php echo $item_id_1.$cart_argument.$sending_url.$item_id_1;?>" class="book_btn mt-0 mb-5">Add to Cart <i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
               </div>
               <div class="col-md-4" id="<?php echo $item_id_2;?>">
                  <div class="img_box">
                     <figure><img src="images/<?php echo $item_images_10;?>" alt="#" class="rounded"/></figure>
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
                  <p><?php echo $item_names_2;?></p>
                  <p style="margin-top:-10px;">£<?php echo $item_cost_2;?></p>
                  <a href="./cart_manager.php?id=<?php echo $item_id_2.$cart_argument.$sending_url.$item_id_2;?>" class="book_btn mt-0 mb-5">Add to Cart <i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
               </div>
               <div class="col-md-4" id="<?php echo $item_id_3;?>">
                  <div class="img_box">
                     <figure><img src="images/<?php echo $item_images_11;?>" alt="#" class="rounded"/></figure>
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
                  <p><?php echo $item_names_3;?></p>
                  <p style="margin-top:-10px;">£<?php echo $item_cost_3;?></p>
                  <a href="./cart_manager.php?id=<?php echo $item_id_3.$cart_argument.$sending_url.$item_id_3;?>" class="book_btn mt-0 mb-5">Add to Cart <i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4" id="<?php echo $item_id_4;?>">
                  <div class="img_box">
                     <figure><img src="images/<?php echo $item_images_12;?>" alt="#" class="rounded"/></figure>
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
                  <p><?php echo $item_names_4;?></p>
                  <p style="margin-top:-10px;">£<?php echo $item_cost_4;?></p>
                  <a href="./cart_manager.php?id=<?php echo $item_id_4.$cart_argument.$sending_url.$item_id_4;?>" class="book_btn mt-0 mb-5">Add to Cart <i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
               </div>
               <div class="col-md-4" id="<?php echo $item_id_5;?>">
                  <div class="img_box">
                     <figure><img src="images/<?php echo $item_images_13;?>" alt="#" class="rounded"/></figure>
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
                  <p><?php echo $item_names_5;?></p>
                  <p style="margin-top:-10px;">£<?php echo $item_cost_5;?></p>
                  <a href="./cart_manager.php?id=<?php echo $item_id_5.$cart_argument.$sending_url.$item_id_5;?>" class="book_btn mt-0 mb-5">Add to Cart <i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
               </div>
               <div class="col-md-4" id="<?php echo $item_id_6;?>">
                  <div class="img_box">
                     <figure><img src="images/<?php echo $item_images_14;?>" alt="#" class="rounded"/></figure>
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
                  <p><?php echo $item_names_6;?></p>
                  <p style="margin-top:-10px;">£<?php echo $item_cost_6;?></p>
                  <a href="./cart_manager.php?id=<?php echo $item_id_6.$cart_argument.$sending_url.$item_id_6;?>" class="book_btn mt-0 mb-5">Add to Cart <i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4" id="<?php echo $item_id_7;?>">
                  <div class="img_box">
                     <figure><img src="images/<?php echo $item_images_15;?>" alt="#" class="rounded"/></figure>
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
                  <p><?php echo $item_names_7;?></p>
                  <p style="margin-top:-10px;">£<?php echo $item_cost_7;?></p>
                  <a href="./cart_manager.php?id=<?php echo $item_id_7.$cart_argument.$sending_url.$item_id_7;?>" class="book_btn mt-0 mb-5">Add to Cart <i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
               </div>
               <div class="col-md-4" id="<?php echo $item_id_8;?>">
                  <div class="img_box">
                     <figure><img src="images/<?php echo $item_images_16;?>" alt="#" class="rounded"/></figure>
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
                  <p><?php echo $item_names_8;?></p>
                  <p style="margin-top:-10px;">£<?php echo $item_cost_8;?></p>
                  <a href="./cart_manager.php?id=<?php echo $item_id_8.$cart_argument.$sending_url.$item_id_8;?>" class="book_btn mt-0 mb-5">Add to Cart <i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
               </div>
               <div class="col-md-4" id="<?php echo $item_id_9;?>">
                  <div class="img_box">
                     <figure><img src="images/<?php echo $item_images_17;?>" alt="#" class="rounded"/></figure>
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
                  <p><?php echo $item_names_9;?></p>
                  <p style="margin-top:-10px;">£<?php echo $item_cost_9;?></p>
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

