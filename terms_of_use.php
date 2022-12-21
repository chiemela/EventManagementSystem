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
                            <h2>Terms of Use</h2>
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
            <h3>Better Than At Home Terms of Use</h3>
            Welcome to the www.eventmanagementsystem.com website (the "Website").
            <p style="text-align: justify; text-justify: inter-word;">www.eventmanagementsystem.com provides this Website and Services (located at eventmanagementsystem.com) to you subject to the notices, terms, and conditions set forth in these terms (the "Terms of Use"). In addition, when you use any of our Services, you will be subject to the rules, guidelines, policies, terms, and conditions applicable to such service, and they are incorporated into this Terms of Use by this reference.</p>
            These Terms of Use are effective as of September 18, 2020.

            Your eligibility for use of the Website is contingent upon meeting the following conditions:
            <ul>
                <li>You are at least 18 years of age</li>
                <li>You use the Website and Services according to these Terms of Use and all applicable laws and regulations determined by the state and country of residence</li>
                <li>You provide complete and accurate registration information and maintain accurate registration information on the Website</li>
                <li>You agree and understand that www.eventmanagementsystem.com may, at any time, and without prior notice, revoke and/or cancel your access if you fail to meet these criteria or violate any portion of these Terms of Use</li>
            </ul>
            <h3>Use of this Website</h3>
            <p style="text-align: justify; text-justify: inter-word;">In connection with your use of our Website, you must act responsibly and exercise good judgment. Without limiting the foregoing, you will not:</p>

            <ul>
                <li>Violate any local, state, provincial, national, or other law or regulation, or any order of a court</li>
                <li>Infringe the rights of any person or entity, including without limitation, their intellectual property, privacy, publicity or contractual rights</li>
                <li>Interfere with or damage our Services, including, without limitation, through the use of viruses, cancel bots, Trojan horses, harmful code, flood pings, denial-of-service attacks, packet or IP spoofing, forged routing or electronic mail address information or similar methods or technology</li>
                <li>Use automated scripts to collect information or otherwise interact with the Services or the Website</li>
                <li>Enter into this agreement on behalf of another person or entity without consent or the legal capacity to make such agreements as a representative of an organization or entity</li>
            </ul>
            <h3>Intellectual Property</h3>
            <p style="text-align: justify; text-justify: inter-word;">All code, text, software, scripts, graphics, files, photos, images, logos, and materials contained on this Website, or within the Services, are the sole property of www.eventmanagementsystem.com.</p>
            Unauthorized use of any materials contained on this Website or within the Service may violate copyright laws, trademark laws, the laws of privacy and publicity, and/or other regulations and statutes. If you believe that any of the materials infringe on any third party's rights, please contact www.eventmanagementsystem.com immediately at the address provided below.
            <h3>Third Party Websites</h3>
            <p style="text-align: justify; text-justify: inter-word;">Our Website may link you to other sites on the Internet or otherwise include references to information, documents, software, materials and/or services provided by other parties. These websites may contain information or material that some people may find inappropriate or offensive.</p>
            These other websites and parties are not under our control, and you acknowledge that we are not responsible for the accuracy, copyright compliance, legality, decency, or any other aspect of the content of such sites, nor are we responsible for errors or omissions in any references to other parties or their products and services. The inclusion of such a link or reference is provided merely as a convenience and does not imply endorsement of, or association with, the Website or party by us, or any warranty of any kind, either express or implied.
            <h3>Disclaimer of Warranty and Limitation of Liability</h3>
            <p style="text-align: justify; text-justify: inter-word;">The Website is provided "AS IS." appfigures, its suppliers, officers, directors, employees, and agents exclude and disclaim all representations and warranties, express or implied, related to this Website or in connection with the Services. You exclude www.eventmanagementsystem.com from all liability for damages related to or arising out of the use of this Website.</p>

            <h3>Changes to these Terms of Use</h3>
            <p style="text-align: justify; text-justify: inter-word;">www.eventmanagementsystem.com retains the right to, at any time, modify or discontinue, any or all parts of the Website without notice.</p>
            Additionally, www.eventmanagementsystem.com reserves the right, in its sole discretion, to modify these Terms of Use at any time, effective by posting new terms on the Website with the date of modification. You are responsible for reading and understanding the terms of this agreement prior to registering with, or using the Service. Your use of the Website and/or Services after any such modification has been published constitutes your acceptance of the new terms as modified in these Terms of Use.
            <h3>Governing Law</h3>
            <p style="text-align: justify; text-justify: inter-word;">These Terms of Use and any dispute or claim arising out of, or related to them, shall be governed by and construed in accordance with the internal laws of the Federal Republic of Nigeria without giving effect to any choice or conflict of law provision or rule.</p>
            Any legal suit, action or proceeding arising out of, or related to, these Terms of Use or the Website shall be instituted exclusively in the federal courts of Nigeria.
            <h3>Feedback and Information</h3>
            Any feedback you provide at this site shall be deemed to be non-confidential. Better Than At Home shall be free to use such information on an unrestricted basis.

            <em>The information contained in this web site is subject to change without notice.</em>
            <em>Copyright © 2021 Better Than At Home. All rights reserved.</em>
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

