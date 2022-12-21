<?php
/**
 * INSTRUCTIONS ON HOW TO USE THIS API: Paste the code below in the receiving file to access the email at [0] item. Use loop to iterate all items
 * include "./api/getUsers.php";
 * $users = get_users();
 * echo "<br>your address: ".$address = $users[0]["email"];
 *  example:
 *   <tbody>
 *   <?php
 *       if ($services !== true) {
 *       $i = 0;
 *       $serial_number = 1;
 *       while ($i < count($services)) {
 *           echo '
 *           <tr>
 *               <td>'.$serial_number.'</td>
 *               <td>'.$services[$i]['service_id'].'</td>
 *               <td>'.$services[$i]['service_name'].'</td>
 *               <td>'.$services[$i]['service_cost'].'</td>
 *               <td>'.$services[$i]['image'].'</td>
 *               <td>'.$services[$i]['service_availability_status'].'</td>
 *               <td>'.$services[$i]['service_last_updated_datetime'].'</td>
 *               <td>'.$services[$i]['creation_date'].'</td>
 *           </tr>
 *           ';
 *           $i++;
 *           $serial_number++;
 *       }
 *       }
 *   ?>
 *   </tbody>
 */
function update_booking_status($var1, $var2) {

    try {

        global $link;
        
        $booking_status = $var1;
        $post_error = true;
    
        // Attempt update query execution for TABLE
        $sql = "UPDATE booking SET booking_status = '$var1' WHERE booking_id = '$var2'";
    
        if (mysqli_query($link, $sql)) {

            $_SESSION["cancel_booking_success_messge"] = "Booking Successfully Cancelled. You will be refunded after 5 working days.";
            // Redirect user to welcome page
            $URL_redirect = "./booking_manager.php?res=OK";
            header("location: ".$URL_redirect);

        } else {

            echo $_SESSION["updateBooking_error"] = "ERROR: Could not able to execute $sql. " . mysqli_error($link);

            // Redirect user to welcome page
            $URL_redirect = "./booking_manager.php?res=ERROR";
            header("location: ".$URL_redirect);

        }

    } catch (\Throwable $th) {
        echo $th;
    }
}

?>