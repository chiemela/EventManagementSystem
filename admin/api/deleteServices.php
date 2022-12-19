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
function delete_services($var1) {

    try {

        global $link;
    
        if(!empty($var1)){
            
            // Attempt delete query execution
            $sql = "DELETE FROM service WHERE service_id = '$var1'";
            if(mysqli_query($link, $sql)){
                // Redirect user to welcome page
                $URL_redirect = "./manage_services.php?res=OK";
                header("location: ".$URL_redirect);
            } else{
                $_SESSION["service_delete_error"] = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                // Redirect user to welcome page
                $URL_redirect = "./manage_services.php?res=OK";
                header("location: ".$URL_redirect);
            }
        }

    } catch (\Throwable $th) {
        echo $th;
    }
}

?>