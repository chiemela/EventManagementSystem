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
function get_services() {

    try {

        global $link;
    
        $service_id = null;
        $service_name = null;
        $service_cost = null;
        $image  = null;
        $service_availability_status = null;
        $service_last_updated_datetime = null;
        $creation_date = null;
        $return_error = true;
    
        $sql = 'SELECT * FROM service';
        $stmnt = $link->prepare($sql);
        $stmnt->execute();
        $stmnt->bind_result(
            $service_id,
            $service_name,
            $service_cost,
            $image ,
            $service_availability_status,
            $service_last_updated_datetime,
            $creation_date
        );
    
        while ($stmnt->fetch()) {
    
            $return_error = false;
            $data[] = array(
          
                "service_id" => $service_id,
                "service_name" => $service_name,
                "service_cost" => $service_cost,
                "image" => $image,
                "service_availability_status" => $service_availability_status,
                "service_last_updated_datetime" => $service_last_updated_datetime,
                "creation_date" => $creation_date
        
            );
        
        }
    
        return $res = $return_error ? $return_error : $data;

    } catch (\Throwable $th) {
        echo $th;
    }

}

function get_services_where($id) {

    try {

        global $link;
    
        $service_id = null;
        $service_name = null;
        $service_cost = null;
        $image  = null;
        $service_availability_status = null;
        $service_last_updated_datetime = null;
        $creation_date = null;
        $return_error = true;
    
        $sql = 'SELECT * FROM service WHERE service_id = ?';
        $stmnt = $link->prepare($sql);
        $stmnt->bind_param("s", $id);
        $stmnt->execute();
        $stmnt->bind_result(
            $service_id,
            $service_name,
            $service_cost,
            $image,
            $service_availability_status,
            $service_last_updated_datetime,
            $creation_date
        );
    
        while ($stmnt->fetch()) {
    
            $return_error = false;
            $data[] = array(
          
                "service_id" => $service_id,
                "service_name" => $service_name,
                "service_cost" => $service_cost,
                "image" => $image,
                "service_availability_status" => $service_availability_status,
                "service_last_updated_datetime" => $service_last_updated_datetime,
                "creation_date" => $creation_date
        
            );
        
        }
    
        return $res = $return_error ? $return_error : $data;

    } catch (\Throwable $th) {
        echo $th;
    }

}

?>