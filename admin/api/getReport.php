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
function get_report() {

    try {

        global $link;
    
        $booking_id = null;
        $user_id = null;
        $transaction_ref = null;
        $booking_service_id  = null;
        $booking_cost = null;
        $booking_date = null;
        $booking_time = null;
        $number_of_person = true;
        $transaction_status = true;
        $booking_creation_date = true;
        $return_error = true;
    
        $sql = 'SELECT * FROM booking';
        $stmnt = $link->prepare($sql);
        $stmnt->execute();
        $stmnt->bind_result(
            $booking_id,
            $user_id,
            $transaction_ref,
            $booking_service_id,
            $booking_cost,
            $booking_date,
            $booking_time,
            $number_of_person,
            $transaction_status,
            $booking_creation_date
        );
    
        while ($stmnt->fetch()) {
    
            $return_error = false;
            $data[] = array(
          
                "booking_id" => $booking_id,
                "user_id" => $user_id,
                "transaction_ref" => $transaction_ref,
                "booking_service_id" => $booking_service_id,
                "booking_cost" => $booking_cost,
                "booking_date" => $booking_date,
                "booking_time" => $booking_time,
                "number_of_person" => $number_of_person,
                "transaction_status" => $transaction_status,
                "booking_creation_date" => $booking_creation_date
        
            );
        
        }
    
        return $res = $return_error ? $return_error : $data;

    } catch (\Throwable $th) {
        echo $th;
    }

}

function get_report_where_date($first_date, $last_date) {

    try {

        global $link;
    
        $booking_id = null;
        $user_id = null;
        $transaction_ref = null;
        $booking_service_id  = null;
        $booking_cost = null;
        $booking_date = null;
        $booking_time = null;
        $number_of_person = true;
        $transaction_status = true;
        $booking_creation_date = true;
        $return_error = true;
    
        $sql = 'SELECT * FROM booking WHERE booking_creation_date >= ? ORDER BY booking_creation_date ASC';
        $stmnt = $link->prepare($sql);
        $stmnt->bind_param("s", $first_date);
        $stmnt->execute();
        $stmnt->bind_result(
            $booking_id,
            $user_id,
            $transaction_ref,
            $booking_service_id,
            $booking_cost,
            $booking_date,
            $booking_time,
            $number_of_person,
            $transaction_status,
            $booking_creation_date
        );
    
        while ($stmnt->fetch()) {
            
            if ($booking_creation_date <= $last_date) {
    
                $return_error = false;
                $data[] = array(
            
                    "booking_id" => $booking_id,
                    "user_id" => $user_id,
                    "transaction_ref" => $transaction_ref,
                    "booking_service_id" => $booking_service_id,
                    "booking_cost" => $booking_cost,
                    "booking_date" => $booking_date,
                    "booking_time" => $booking_time,
                    "number_of_person" => $number_of_person,
                    "transaction_status" => $transaction_status,
                    "booking_creation_date" => $booking_creation_date
            
                );
            }
        
        }
    
        return $res = $return_error ? $return_error : $data;

    } catch (\Throwable $th) {
        echo $th;
    }

}

?>