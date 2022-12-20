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
function post_services($var1, $var2, $var3, $var4, $var5) {

    try {

        global $link;
    
        $service_name = $var1;
        $service_cost = $var2;
        $image = $var3;
        $service_availability_status = $var4;
        $service_last_updated_datetime = $var5;
        $post_error = true;
    
        if(!empty($var1) && !empty($var2) && !empty($var3) && !empty($var4) && !empty($var5)){
            
            // Prepare an insert statement
            $sql = "INSERT INTO service (service_name, service_cost, image, service_availability_status, service_last_updated_datetime) VALUES (?, ?, ?, ?, ?)";
             
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sssss", $service_name, $service_cost, $image, $service_availability_status, $service_last_updated_datetime);
                
                // Set parameters
                $service_name = $var1;
                $service_cost = $var2;
                $image = $var3;
                $service_availability_status = $var4;
                $service_last_updated_datetime = $var5;
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
    
                    $post_error = false;
                    $_SESSION["success_messge"] = "Saved successfully...";
                    $URL_redirect = "./manage_services.php?res=OK";
                    // Redirect user to welcome page
                    header("location: ".$URL_redirect);
    
                } else{
    
                    $_SESSION["post_error"] = "Something went wrong. Please try again later. $sql. " . mysqli_error($link);
                    $URL_redirect = "./manage_services.php?res=ERROR";
                    // Redirect user to welcome page
                    header("location: ".$URL_redirect);
    
                }
    
                // Close statement
                mysqli_stmt_close($stmt);
            }
        } else {
    
            // Destroying session
            $_SESSION["post_error"] = "Form field is empty!";
            $URL_redirect = "./manage_services.php?res=EMPTY";
            // Redirect user to welcome page
            header("location: ".$URL_redirect);
    
        }
        
        return $res = $post_error ? $_SESSION["post_error"] : $_SESSION["manage_services_add_success_messge"];

    } catch (\Throwable $th) {
        echo $th;
    }

}

?>