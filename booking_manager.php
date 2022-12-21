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

$email = $_SESSION["email"];
// get all user info
include "./admin/api/getUsers.php";
include "./admin/api/getReport.php";
$user_details = get_user_where($email);
$booking_details = get_report_where_user_id($user_details[0]['id']);

if(!empty($_SESSION["cancel_booking_success_messge"])){
    $cancel_booking_message = $_SESSION["cancel_booking_success_messge"];
    $_SESSION["cancel_booking_success_messge"] = "";
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


    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                            <h2><span class="text_norlam">Your Personal</span> Booking Manager <i class='fa fa-calendar' aria-hidden='true'></i>
                            </div></h2>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </section>
        <!-- end form_lebal -->
        <p class="text-center" style="color: #2EBB0B;">
            <?php 
                if(!empty($cancel_booking_message)){
                    echo $cancel_booking_message;
                }
            ?>
        </p>
        <!-- our services -->
        <div class="our">
            <div class="container">
                <div class="row">
                <div class="col-xl-9 col-md-9 mb-4">
                    <div class="row">
                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Booking History</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Meal</th>
                                            <th>Cost</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Attendees</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Meal</th>
                                            <th>Cost</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Attendees</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            if ($booking_details !== true) {
                                                $i = 0;
                                                $serial_number = 1;
                                                while ($i < count($booking_details)) {
                                                $item_id = $booking_details[$i]['booking_id'];
                                                $delete_url = "booking_manager_delete.php?id=$item_id";
                                                echo '
                                                    <tr>
                                                    <td>'.$serial_number.'</td>
                                                    <td>';
                                                        $meal_items = $booking_details[$i]['booking_service_id'];
                                                        $meal_items = explode(",", $meal_items);
                                                        array_pop($meal_items);
                                                        $meal_items_count = count($meal_items);
                                                        for($b = 0; $b < $meal_items_count; $b++){
                                                            // get the cost for meal by their $id
                                                            $service_id = $meal_items[$b];
                                                            try {
                                                                $sqlservice = "SELECT service_name FROM service WHERE service_id = '$service_id'";
                                                                if($resultservice = mysqli_query($link, $sqlservice)){
                                                                    if(mysqli_num_rows($resultservice) > 0){
                                                                        while($rowservice = mysqli_fetch_array($resultservice)){
                                                                            // Assign mealname
                                                                            $mealname = $rowservice['service_name'];
                                                                            echo $mealname.", ";
                                                                        }
                                                                        // Free result set
                                                                        mysqli_free_result($resultservice);
                                                                    } else{
                                                                        echo "<p class='lead'><em>No records were found.</em></p>";
                                                                    }
                                                                } else{
                                                                    echo "ERROR: Could not able to execute $sqlservice. " . mysqli_error($link);
                                                                }
                                                        
                                                            } catch (\Throwable $th) {
                                                                echo $th;
                                                            }
                                                            // $services_where = get_services_where($meal_items[$b]);
                                                            // $service_name = $services_where[0]['service_name'];
                                                        }
                                                        echo ' 
                                                    </td>
                                                    <td>£'.$booking_details[$i]['booking_cost'].'</td>
                                                    <td>'.$booking_details[$i]['booking_date'].'</td>
                                                    <td>'.$booking_details[$i]['booking_time'].'</td>
                                                    <td>'.$booking_details[$i]['number_of_person'].'</td>
                                                    <td>'.$booking_details[$i]['booking_status'].'</td>
                                                    <td>';
                                                        if($booking_details[$i]['booking_status'] == "Active"){
                                                            echo '<a href="'.$delete_url.'" class="btn btn-danger" title="Cancel this booking"><i class="fa fa-times"></i> Cancel</a>';
                                                        }else{
                                                            echo 'No Action Required';
                                                        }
                                                        
                                                        echo '
                                                    </td>
                                                    </tr>
                                                ';
                                                $i++;
                                                $serial_number++;
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    <div class="col-xl-3 col-md-3 mb-4">
                        <!-- Checkout -->
                        <div class="card mb-4">
                            <div class="card-header">
                                Your Cart <i class="fa fa-shopping-cart"></i>
                            </div>
                            <div class="card-body">
                                
                                <?php
                                if(!empty($_SESSION["cart_items"])){
                                    echo '
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
        
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
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

