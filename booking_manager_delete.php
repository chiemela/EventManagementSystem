<?php

// start session
session_start();
// Include config file
require_once "./config.php";


// get all services
include "./admin/api/updateBooking.php";

if(!empty($_GET["id"])){
    $var1 = "Cancelled";
    $booking_id = $_GET["id"];
    // pass the ID into the function
    $services_where = update_booking_status($var1, $booking_id);
}else{
    // Redirect user to welcome page
    $URL_redirect = "./booking_manager.php?res=UNIDENTIFIED_ID";
    header("location: ".$URL_redirect);
}
?>