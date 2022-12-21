<?php
/*
if(!empty($_COOKIE['getDate'])){
    echo "<br/>".$myphpVar = $_COOKIE['getDate'];
}
*/
// start session
session_start();
// Include config file
require_once "./config.php";
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

      // get all services
      include "./admin/api/getServices.php";
      $services = get_services();
      
      if(!empty($_GET["cart"])){
         $cart = $_GET["cart"];
         $_SESSION["cart_items"] = [];
         $_SESSION["cart_items"] = "";
      }
      
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
      <!-- get services from database -->
      
      <div class="our">
         <div class="container">
            <div class="row">
               <?php
                  if ($services !== true) {
                     $i = 0;
                     while ($i < count($services)) {
                      
                        $service_id = $services[$i]['service_id'];
                        $service_name = $services[$i]['service_name'];
                        $service_cost = $services[$i]['service_cost'];
                        $image = $services[$i]['image'];
                        $service_availability_status = $services[$i]['service_availability_status'];
                        // check service_availability_status and if it's "Available" then display on the page
                        if($service_availability_status == "Available"){
                           echo '
                              <div class="col-md-4" id="'.$service_id.'">
                                 <div class="img_box">
                                    <figure><img src="images/'.$image.'" alt="#" class="rounded"/></figure>
                                 </div>';
                                 if(!empty($error_item_id)){
                                    if($error_item_id == $service_id){
                                       echo '
                                          <p style="color:red;">This item is already in the Cart</p>
                                       ';
                                    }
                                 }echo'
                                 <p>'.$service_name.'</p>
                                 <p style="margin-top:-10px;">£'.$service_cost.'</p>
                                 <a href="./cart_manager.php?id='.$service_id.$cart_argument.$sending_url.$service_id.'" class="book_btn mt-0 mb-5">Add to Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                              </div>
                           ';
                        }
                        $i++;
                     }
                  }
               ?>
            </div>
         </div>
      </div> 
      <!--  footer -->
      <footer id="contact">
         <div class="">
            <div class="copyright">
               <div class="container">
                  <div class="row footer-horizontal-line">
                     <div class="col-md-12">
                        <p class="mt-2">
                           Copyright 2022 Better Than At Home. All Right Reserved.
                           &nbsp;&nbsp;&nbsp;
                           <a href="./privacy_policy.php">Privacy Policy</a> | 
                           <a href="./terms_of_use.php">Terms of Use</a>
                        </p>
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

