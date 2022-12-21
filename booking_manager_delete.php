<?php

// start session
session_start();
// Include config file
require_once "./config.php";


// get updateBooking
include "./admin/api/updateBooking.php";

// get getBooking
include "./admin/api/getReport.php";

if(!empty($_GET["id"])){
    $var1 = "Cancelled";
    $booking_id = $_GET["id"];
    $booking_id_where = get_report_where_booking_id($booking_id);
    $booking_id_for_email = $booking_id_where[0]['booking_id'];
    $user_id = $booking_id_where[0]['user_id'];
    $transaction_ref = $booking_id_where[0]['transaction_ref'];
    $booking_service_id = $booking_id_where[0]['booking_service_id'];
    $booking_cost = $booking_id_where[0]['booking_cost'];
    $booking_date = $booking_id_where[0]['booking_date'];
    $booking_time = $booking_id_where[0]['booking_time'];
    $number_of_person = $booking_id_where[0]['number_of_person'];
    $transaction_status = $booking_id_where[0]['transaction_status'];
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
            Hi Admin,
            <br/>
            <br/>
            A booking has been cancelled. Details are below:
            <br/>
            <table style="border:1px solid black;">
                <thead>
                    <tr>
                        <th style="border:1px solid black;">Booking ID</th>
                        <th style="border:1px solid black;">User ID</th>
                        <th style="border:1px solid black;">Transaction Ref</th>
                        <th style="border:1px solid black;">Booked Meal ID</th>
                        <th style="border:1px solid black;">Booking Cost</th>
                        <th style="border:1px solid black;">Booking Date</th>
                        <th style="border:1px solid black;">Booking Time (24Hr)</th>
                        <th style="border:1px solid black;">Attendees</th>
                        <th style="border:1px solid black;">Transaction Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border:1px solid black;">'.$booking_id_for_email.'</td>
                        <td style="border:1px solid black;">'.$user_id.'</td>
                        <td style="border:1px solid black;">'.$transaction_ref.'</td>
                        <td style="border:1px solid black;">'.$booking_service_id.'</td>
                        <td style="border:1px solid black;">£'.$booking_cost.'</td>
                        <td style="border:1px solid black;">'.$booking_date.'</td>
                        <td style="border:1px solid black;">'.$booking_time.'</td>
                        <td style="border:1px solid black;">'.$number_of_person.'</td>
                        <td style="border:1px solid black;">'.$transaction_status.'</td>
                    </tr>
                </tbody>
            </table>
            <br/>
            <br/>
            Regards,
            <br/>
            System Super Administrator
            <br/>
        </div>
    </body>
    </html>
    ';
    // prepare the variables for the mail() funtion
    $toEmail = 'chiemela123@gmail.com';
    $fromEmail = 'BetterThanAtHome@ASE_CW1.com';
    $name = 'System message';
    $emailSubject = 'Booking Cancellation';
    $headers = ['From' => $fromEmail, 'Reply-To' => $fromEmail, 'Content-type' => 'text/html; charset=iso-8859-1'];
    $bodyParagraphs = ["Name: {$name}", "Email: {$fromEmail}", "Message:", $message_body];
    $body = join(PHP_EOL, $bodyParagraphs);
    mail($toEmail, $emailSubject, $body, $headers);

    // pass the ID into the function
    update_booking_status($var1, $booking_id);
}else{
    // Redirect user to welcome page
    $URL_redirect = "./booking_manager.php?res=UNIDENTIFIED_ID";
    header("location: ".$URL_redirect);
}
?>