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
function update_services($var1, $var2, $var3, $var4, $var5, $var6) {

    try {


        global $link;
        
        $service_name = $var1;
        $service_cost = $var2;
        $image = $var3;
        $service_availability_status = $var4;
        $service_last_updated_datetime = $var5;
        $id = $var6;
        $post_error = true;
    
        if(!empty($var1) && !empty($var2) && !empty($var3) && !empty($var4) && !empty($var5)){
            
            // Attempt update query execution for TABLE
            $sql = "UPDATE service SET service_name = '$var1', service_cost = '$var2', image = '$var3', service_availability_status = '$var4', service_last_updated_datetime = '$var5' WHERE service_id = '$var6'";
    
            if (mysqli_query($link, $sql)) {
    
                // Redirect user to welcome page
                $URL_redirect = "./manage_services.php?res=OK";
                header("location: ".$URL_redirect);
    
            } else {
    
                echo $_SESSION["updateServices_error"] = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    
                // Redirect user to welcome page
                $URL_redirect = "./manage_services.php?res=ERROR";
                header("location: ".$URL_redirect);
    
            }
    
        } else {
    
            // Destroying session
            echo $_SESSION["updateServices_error"] = "Form field is empty!";
    
            // Redirect user to welcome page
            $URL_redirect = "./manage_services.php?res=EMPTY";
            header("location: ".$URL_redirect);
    
        }

    } catch (\Throwable $th) {
        echo $th;
    }
}

?>