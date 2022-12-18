<?php
// start session
session_start();
// Include config file
require_once "./config.php";

if(!empty($_COOKIE['transaction_ref'])){
    $user_id = $_SESSION["id"];
    $transaction_ref = $_COOKIE['transaction_ref'];
    $booking_service_id = $_SESSION["cart_items"];
    $booking_cost = $_SESSION["booking_cost"];
    $booking_date = $_SESSION["get_form_date"];
    $booking_time = $_SESSION["get_form_time"];
    $number_of_person = $_SESSION["get_form_person"];
    $transaction_status = "Paid";
    $email = $_SESSION["email"];
    $first_name = $_SESSION["first_name"];
}

try {
    // Prepare an insert statement
    $sql = "INSERT INTO booking (user_id, transaction_ref, booking_service_id, booking_cost, booking_date, booking_time, number_of_person, transaction_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
             
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssssssss", $param_user_id, $param_transaction_ref, $param_booking_service_id, $booking_cost, $param_booking_date, $param_booking_time, $param_number_of_person, $param_transaction_status);
        
        // Set parameters
        $param_user_id = $user_id;
        $param_transaction_ref = $transaction_ref;
        $param_booking_service_id = $booking_service_id;
        $param_booking_cost = $booking_cost;
        $param_booking_date = $booking_date;
        $param_booking_time = $booking_time;
        $param_number_of_person = $number_of_person;
        $param_transaction_status = $transaction_status;
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){



            // send confirmation email
            date_default_timezone_set("Europe/London");
            $today = date("F j, Y, g:i a")." local time"; // format is March 10, 2001, 5:16 pm
            // Subject
            $emailSubject = 'Event Management System';
            // Message
            $message_body = '
            <html>
            <head>
            <title>Message body | Event Management System</title>
            </head>
            <body>
                <div id = "container">
                    <br/>
                    <table>
                        <tr>
                            Hi '.$first_name.',
                            <br/>
                            <br/>
                            Booking has been reserved successfully. Please find below the details of your booking.
                            <br/>
                            Transaction ref: '.$transaction_ref.'
                            <br/>
                            Booking date: '.$booking_date.'
                            <br/>
                            Booking time: '.$booking_time.'
                            <br/>
                            Number of person(s): '.$number_of_person.'
                            <br/>
                            Booking cost: £'.$booking_cost.'
                            <br/>
                            Transaction status: '.$transaction_status.'
                            <br/>
                            <br/>
                            Regairds,
                            <br/>
                            Mrs A. Cook
                            <br/>
                            Owner
                        </tr>
                    </table>
                    <br/>
                </div>
            </body>
            </html>
            ';
            // prepare the variables for the mail() funtion
            $toEmail = $email;
            $fromEmail = 'BetterThanAtHome@ase.uk';
            $name = 'Mrs A. Cook';
            $emailSubject = 'New user registration on Better-Than-At-Home';
            $headers = ['From' => $fromEmail, 'Reply-To' => $fromEmail, 'Content-type' => 'text/html; charset=iso-8859-1'];
            $bodyParagraphs = ["Name: {$name}", "Email: {$fromEmail}", "Message:", $message_body];
            $body = join(PHP_EOL, $bodyParagraphs);





            // clear cart
            $_SESSION["cart_items"] = [];
            $_SESSION["cart_items"] = "0";
            // Redirect to service page
            //$sending_url = "./services.php?cart=CLEAR";
            // header("location: ".$sending_url);
        } else{
            echo "Something went wrong. Please try again later. $sql. " . mysqli_error($link);
        }
    
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Close connection
    mysqli_close($link);
} catch (\Throwable $th) {
    echo "Caught error. $th";
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
      <!-- our services -->
      <div class="our">
         <div class="container">
            <div class="row">
                <div class="col-xl-2 col-md-2"></div>
                <div class="col-xl-8 col-md-8 mb-4">
                    <!-- Booking page Card  -->
                    <div class="col-xl-12 col-md-12 mb-4">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters text-center">
                                    <div class="col mb-4">
                                        <figure><img src="images/successful.png" width="200px;" alt="#" class="rounded text-center"/></figure>
                                    </div>
                                </div>
                                <div class="row no-gutters text-center">
                                    <div class="col mb-4">
                                        <p style="font-size: 16px;">Payment Successful!</p>
                                        <p style="margin-top:-10px;">Please check your email for confirmation.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-2"></div>
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

