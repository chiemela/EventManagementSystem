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
$cart_items_count = 0;
$first_name = "";


$cart_argument = "&cart_argument=REMOVE";



// put vegan dish cost into array
$item_total_cost = array();

$subtotal = 0.00;
$VAT = 0.00;
$total_including_VAT = 0.00;


// get values from booking url
if(!empty($_GET["date"]) && !empty($_GET["time"]) && !empty($_GET["person"])){
   $_SESSION["get_form_date"] = $get_form_date = $_GET["date"];
   $_SESSION["get_form_time"] = $get_form_time = $_GET["time"];
   $_SESSION["get_form_person"] = $get_form_person = $_GET["person"];
}
// set to default values
else{
   // booking details
   date_default_timezone_set('Europe/London'); // Get the current datetime for London
   $_SESSION["get_form_date"] = $get_form_date =  date("Y-m-d", strtotime('tomorrow'));
   $_SESSION["get_form_time"] = $get_form_time = date("H:i");
   $_SESSION["get_form_person"] = $get_form_person = "2";
}

$sending_url = "&sending_url=booking.php&date=$get_form_date&time=$get_form_time&person=$get_form_person";

// get cart item
if(!empty($_SESSION["cart_items"])){
   $cart_items = $_SESSION["cart_items"];
   $cart_items = explode(",", $cart_items);
   array_pop($cart_items);
   $cart_items_count = count($cart_items);
   

   // get all services
   include "./admin/api/getServices.php";

   for($i = 0; $i < $cart_items_count; $i++){
      // get the cost for meal by their $id
      $services_where = get_services_where($cart_items[$i]);
      $item_total_cost[] = $services_where[0]['service_cost'];
   }

   // calculate the subtotal
   for($i = 0; $i <= count($item_total_cost); $i++){
      if(!empty($item_total_cost[$i])){
         $subtotal += $item_total_cost[$i];
      }
   }
   // get subtotal according to the number of person booked for.
   $_SESSION["get_form_person"] = $get_form_person;
   $subtotal = $get_form_person * $subtotal;
   // calculate VAT
   $VAT = ($subtotal * 20) / 100;
   // calculate Total including VAT
   $_SESSION["booking_cost"] = $total_including_VAT = $subtotal + $VAT;
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
                           for($i = 0; $i < $cart_items_count; $i++){
                              // get the cost for meal by their $id
                              $services_where = get_services_where($cart_items[$i]);
                              $service_id = $services_where[0]['service_id'];
                              $service_name = $services_where[0]['service_name'];
                              $service_cost = $services_where[0]['service_cost'];
                              $image = $services_where[0]['image'];
                              $item_url = $service_id.$cart_argument.$sending_url;
                              echo '
                                 <!-- Booking page Card  -->
                                 <div class="col-xl-12 col-md-12 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                       <div class="card-body">
                                          <div class="row no-gutters align-items-center">
                                                <div class="col-8 ml-2 mt-3 mb-0">
                                                   <figure><img src="images/';echo $image; echo'" width="200px;" alt="#" class="rounded"/></figure>
                                                </div>
                                                <div class="col mr-4">
                                                   <p>';echo $service_name; echo'</p>
                                                   <p style="margin-top:-10px;">£';echo $service_cost; echo'</p>
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
                        Booking and Checkout <i class="fa fa-arrow-right"></i>
                     </div>
                     <div class="card-body">
                        <b><i class="fa fa-list"></i> Booking details</b>
                        <br/>
                        <br/>
                        <div class="d-flex justify-content-between">
                           <div>
                              Date
                           </div>
                           <div>
                              <span id="setDate"><?php echo $get_form_date;?></span>
                           </div>
                        </div>
                        <p></p>
                        <div class="d-flex justify-content-between">
                           <div>
                              Time(24Hr)
                           </div>
                           <div>
                              <span id="setTime"><?php echo $get_form_time;?></span>
                           </div>
                        </div>
                        <p></p>
                        <div class="d-flex justify-content-between">
                           <div>
                              Person
                           </div>
                           <div>
                              <span id="setPerson"><?php echo $get_form_person;?></span>
                           </div>
                        </div>
                        <?php
                           if(!empty($_SESSION["cart_items"])){
                              echo '
                                 <p></p><hr/><p></p>
                                 <b><i class="fa fa-check"></i> Checkout details</b>
                                 <br/>
                                 <br/>
                                 <div class="d-flex justify-content-between">
                                    <div>
                                       <b>Name</b>
                                    </div>
                                    <div>
                                       <b>Cost</b>
                                    </div>
                                 </div>
                                 <p></p>
                              ';
                           }else{
                              echo '
                                 <p></p><hr/><p></p>
                                 No Item in the Cart to checkout!
                              ';
                           }
                        ?>
                        <?php
                           // check if selected item is already in the cart
                           for($i = 0; $i < $cart_items_count; $i++){
                              // get the cost for meal by their $id
                              $services_where = get_services_where($cart_items[$i]);
                              $service_id = $services_where[0]['service_id'];
                              $service_name = $services_where[0]['service_name'];
                              $service_cost = $services_where[0]['service_cost'];
                              $image = $services_where[0]['image'];
                              $item_url = $service_id.$cart_argument.$sending_url;
                              echo '
                                 <div class="d-flex justify-content-between">
                                    <div>
                                       ';echo $service_name; echo'
                                    </div>
                                    <div>
                                       £';echo $service_cost; echo'
                                    </div>
                                 </div>
                                 <p></p>
                              ';
                           }
                        ?>
                        <hr/><p></p>
                        <div class="d-flex justify-content-between">
                           <div>
                              Subtotal
                           </div>
                           <div>
                              <span id="setSubTotal">£<?php echo $subtotal;?></span>
                           </div>
                        </div>
                        <p></p>
                        <div class="d-flex justify-content-between">
                           <div>
                              VAT(20%)
                           </div>
                           <div>
                              <span id="setVAT">£<?php echo $VAT;?></span>
                           </div>
                        </div>
                        <p></p>
                        <div class="d-flex justify-content-between">
                           <div>
                              Total(incl. VAT)
                           </div>
                           <div>
                              <span id="setTotal">£<?php echo $total_including_VAT;?></span>
                           </div>
                        </div>
                        <!-- Replace "test" with your own sandbox Business account app client ID -->
                        <?php
                           if(isset($_SESSION["loggedin"])){
                              if(!empty($_SESSION["cart_items"])){
                                 echo '
                                    <p></p><hr/><p></p>
                                    <script src="https://www.paypal.com/sdk/js?client-id=AeZIaJ8o4faEG3YvSX2is7Erdm_0I4N1rrNehgKM2Fkp6LpakZcbBTYQBLP6_bvaccWoIYv8rrgwtfbC&currency=GBP"></script>
                                 ';
                              }
                           }
                        ?>
                        <!-- Set up a container element for the button -->
                        <div id="paypal-button-container" width="100%"></div>
                        <script>
                           function fnRedirect() {
                              window.location.href = "./payment.php";
                           }
                           paypal.Buttons({
                              // Sets up the transaction when a payment button is clicked
                              createOrder: (data, actions) => {
                                 return actions.order.create({
                                    purchase_units: [{
                                       amount: {
                                       value: <?php echo $total_including_VAT;?> // Can also reference a variable or function
                                       }
                                    }]
                                 });
                              },
                              // Finalize the transaction after payer approval
                              onApprove: (data, actions) => {
                                 return actions.order.capture().then(function(orderData) {
                                    // Successful capture! For dev/demo purposes:
                                    //console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                                    const transaction = orderData.purchase_units[0].payments.captures[0];
                                    //alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                                    document.cookie = "transaction_ref = " + transaction.id;
                                    fnRedirect();
                                    //fnRedirect();
                                    // When ready to go live, remove the alert and show a success message within this page. For example:
                                    // const element = document.getElementById('paypal-button-container');
                                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                                    // Or go to another URL:  actions.redirect('thank_you.html');
                                 });
                              }
                           }).render('#paypal-button-container');
                        </script>
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

