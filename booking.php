<?php
/*
if(!empty($_COOKIE['getDate'])){
    echo "<br/>".$myphpVar = $_COOKIE['getDate'];
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

$cart_argument = "&cart_argument=REMOVE";



// put vegan dish cost into array
$item_total_cost = array();

$subtotal = "0.00";
$VAT = "0.00";
$total_including_VAT = "0.00";


// get values from booking url
if(!empty($_GET["date"]) && !empty($_GET["time"]) && !empty($_GET["person"])){
   $get_form_date = $_GET["date"];
   $get_form_time = $_GET["time"];
   $get_form_person = $_GET["person"];
}
// set to default values
else{
   // booking details
   date_default_timezone_set('Europe/London'); // Get the current datetime for London
   $get_form_date =  date("Y-m-d", strtotime('tomorrow'));
   $get_form_time = date("H:i");
   $get_form_person = "2";
}

$sending_url = "&sending_url=booking.php&date=$get_form_date&time=$get_form_time&person=$get_form_person";

// get cart item
if(!empty($_SESSION["cart_items"])){
   $cart_items = $_SESSION["cart_items"];
   $cart_items = explode(",", $cart_items);
   array_pop($cart_items);
   $cart_items_count = count($cart_items);

   // add prices to the array
   if(strpos($_SESSION["cart_items"], "1") !== false){
      $item_total_cost[] = $item_cost_1;
   }
   if(strpos($_SESSION["cart_items"], "2") !== false){
      $item_total_cost[] = $item_cost_2;
   }
   if(strpos($_SESSION["cart_items"], "3") !== false){
      $item_total_cost[] = $item_cost_3;
   }
   if(strpos($_SESSION["cart_items"], "4") !== false){
      $item_total_cost[] = $item_cost_4;
   }
   if(strpos($_SESSION["cart_items"], "5") !== false){
      $item_total_cost[] = $item_cost_5;
   }
   if(strpos($_SESSION["cart_items"], "6") !== false){
      $item_total_cost[] = $item_cost_6;
   }
   if(strpos($_SESSION["cart_items"], "7") !== false){
      $item_total_cost[] = $item_cost_7;
   }
   if(strpos($_SESSION["cart_items"], "8") !== false){
      $item_total_cost[] = $item_cost_8;
   }
   if(strpos($_SESSION["cart_items"], "9") !== false){
      $item_total_cost[] = $item_cost_9;
   }

   // calculate the subtotal
   for($i = 0; $i <= count($item_total_cost); $i++){
      if(!empty($item_total_cost[$i])){
         $subtotal += $item_total_cost[$i];
      }
   }
   // get subtotal according to the number of person booked for
   $_SESSION["get_form_person"] = $get_form_person;
   $subtotal = $get_form_person * $subtotal;
   // calculate VAT
   $VAT = ($subtotal * 20) / 100;
   // calculate Total including VAT
   $total_including_VAT = $subtotal + $VAT;
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
                                                   <figure><img src="images/';echo $item_images_9; echo'" width="200px;" alt="#" class="rounded"/></figure>
                                                </div>
                                                <div class="col mr-4">
                                                   <p>';echo $item_names_1; echo'</p>
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
                                                   <figure><img src="images/';echo $item_images_10; echo'" width="200px;" alt="#" class="rounded"/></figure>
                                                </div>
                                                <div class="col mr-4">
                                                   <p>';echo $item_names_2; echo'</p>
                                                   <p style="margin-top:-10px;">£';echo $item_cost_2; echo'</p>
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
                                                   <figure><img src="images/';echo $item_images_11; echo'" width="200px;" alt="#" class="rounded"/></figure>
                                                </div>
                                                <div class="col mr-4">
                                                   <p>';echo $item_names_3; echo'</p>
                                                   <p style="margin-top:-10px;">£';echo $item_cost_3; echo'</p>
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
                                                   <figure><img src="images/';echo $item_images_12; echo'" width="200px;" alt="#" class="rounded"/></figure>
                                                </div>
                                                <div class="col mr-4">
                                                   <p>';echo $item_names_4; echo'</p>
                                                   <p style="margin-top:-10px;">£';echo $item_cost_4; echo'</p>
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
                                                   <figure><img src="images/';echo $item_images_13; echo'" width="200px;" alt="#" class="rounded"/></figure>
                                                </div>
                                                <div class="col mr-4">
                                                   <p>';echo $item_names_5; echo'</p>
                                                   <p style="margin-top:-10px;">£';echo $item_cost_5; echo'</p>
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
                                                   <figure><img src="images/';echo $item_images_14; echo'" width="200px;" alt="#" class="rounded"/></figure>
                                                </div>
                                                <div class="col mr-4">
                                                   <p>';echo $item_names_6; echo'</p>
                                                   <p style="margin-top:-10px;">£';echo $item_cost_6; echo'</p>
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
                                                   <figure><img src="images/';echo $item_images_15; echo'" width="200px;" alt="#" class="rounded"/></figure>
                                                </div>
                                                <div class="col mr-4">
                                                   <p>';echo $item_names_7; echo'</p>
                                                   <p style="margin-top:-10px;">£';echo $item_cost_7; echo'</p>
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
                                                   <figure><img src="images/';echo $item_images_16; echo'" width="200px;" alt="#" class="rounded"/></figure>
                                                </div>
                                                <div class="col mr-4">
                                                   <p>';echo $item_names_8; echo'</p>
                                                   <p style="margin-top:-10px;">£';echo $item_cost_8; echo'</p>
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
                                                   <figure><img src="images/';echo $item_images_17; echo'" width="200px;" alt="#" class="rounded"/></figure>
                                                </div>
                                                <div class="col mr-4">
                                                   <p>';echo $item_names_9; echo'</p>
                                                   <p style="margin-top:-10px;">£';echo $item_cost_9; echo'</p>
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
                        $item_id = "1";
                        if(!empty($_SESSION["cart_items"]) && strpos($_SESSION["cart_items"], $item_id) !== false){
                           echo '
                              <div class="d-flex justify-content-between">
                                 <div>
                                    ';echo $item_names_1; echo'
                                 </div>
                                 <div>
                                    £';echo $item_cost_1; echo'
                                 </div>
                              </div>
                              <p></p>
                           ';
                        }
                        $item_id = "2";
                        if(!empty($_SESSION["cart_items"]) && strpos($_SESSION["cart_items"], $item_id) !== false){
                           echo '
                              <div class="d-flex justify-content-between">
                                 <div>
                                    ';echo $item_names_2; echo'
                                 </div>
                                 <div>
                                    £';echo $item_cost_2; echo'
                                 </div>
                              </div>
                              <p></p>
                           ';
                        }
                        $item_id = "3";
                        if(!empty($_SESSION["cart_items"]) && strpos($_SESSION["cart_items"], $item_id) !== false){
                           echo '
                              <div class="d-flex justify-content-between">
                                 <div>
                                    ';echo $item_names_3; echo'
                                 </div>
                                 <div>
                                    £';echo $item_cost_3; echo'
                                 </div>
                              </div>
                              <p></p>
                           ';
                        }
                        $item_id = "4";
                        if(!empty($_SESSION["cart_items"]) && strpos($_SESSION["cart_items"], $item_id) !== false){
                           echo '
                              <div class="d-flex justify-content-between">
                                 <div>
                                    ';echo $item_names_4; echo'
                                 </div>
                                 <div>
                                    £';echo $item_cost_4; echo'
                                 </div>
                              </div>
                              <p></p>
                           ';
                        }
                        $item_id = "5";
                        if(!empty($_SESSION["cart_items"]) && strpos($_SESSION["cart_items"], $item_id) !== false){
                           echo '
                              <div class="d-flex justify-content-between">
                                 <div>
                                    ';echo $item_names_5; echo'
                                 </div>
                                 <div>
                                    £';echo $item_cost_5; echo'
                                 </div>
                              </div>
                              <p></p>
                           ';
                        }
                        $item_id = "6";
                        if(!empty($_SESSION["cart_items"]) && strpos($_SESSION["cart_items"], $item_id) !== false){
                           echo '
                              <div class="d-flex justify-content-between">
                                 <div>
                                    ';echo $item_names_6; echo'
                                 </div>
                                 <div>
                                    £';echo $item_cost_6; echo'
                                 </div>
                              </div>
                              <p></p>
                           ';
                        }
                        $item_id = "7";
                        if(!empty($_SESSION["cart_items"]) && strpos($_SESSION["cart_items"], $item_id) !== false){
                           echo '
                              <div class="d-flex justify-content-between">
                                 <div>
                                    ';echo $item_names_7; echo'
                                 </div>
                                 <div>
                                    £';echo $item_cost_7; echo'
                                 </div>
                              </div>
                              <p></p>
                           ';
                        }
                        $item_id = "8";
                        if(!empty($_SESSION["cart_items"]) && strpos($_SESSION["cart_items"], $item_id) !== false){
                           echo '
                              <div class="d-flex justify-content-between">
                                 <div>
                                    ';echo $item_names_8; echo'
                                 </div>
                                 <div>
                                    £';echo $item_cost_8; echo'
                                 </div>
                              </div>
                              <p></p>
                           ';
                        }
                        $item_id = "9";
                        if(!empty($_SESSION["cart_items"]) && strpos($_SESSION["cart_items"], $item_id) !== false){
                           echo '
                              <div class="d-flex justify-content-between">
                                 <div>
                                    ';echo $item_names_9; echo'
                                 </div>
                                 <div>
                                    £';echo $item_cost_9; echo'
                                 </div>
                              </div>
                              <p></p>
                           ';
                        }
                        ?><hr/><p></p>
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
                           if(!empty($_SESSION["cart_items"])){
                              echo '
                                 <p></p><hr/><p></p>
                                 <script src="https://www.paypal.com/sdk/js?client-id=AeZIaJ8o4faEG3YvSX2is7Erdm_0I4N1rrNehgKM2Fkp6LpakZcbBTYQBLP6_bvaccWoIYv8rrgwtfbC&currency=GBP"></script>
                              ';
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
                                    document.cookie = "myjavascriptVar = " + transaction.id;
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

