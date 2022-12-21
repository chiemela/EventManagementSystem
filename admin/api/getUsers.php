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
function get_users() {

    try {

        global $link;
    
        $id = null;
        $first_name = null;
        $last_name = null;
        $phone  = null;
        $email = null;
        $password = null;
        $address = null;
        $location = null;
        $role = null;
        $last_updated_datetime = null;
        $creation_date = null;
        $return_error = true;
    
        $sql = 'SELECT * FROM users';
        $stmnt = $link->prepare($sql);
        $stmnt->execute();
        $stmnt->bind_result(
            $id,
            $first_name,
            $last_name,
            $phone,
            $email,
            $password,
            $address,
            $location,
            $role,
            $last_updated_datetime,
            $creation_date
        );
    
        while ($stmnt->fetch()) {
    
            $return_error = false;
            $data[] = array(
          
                "id" => $id,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "phone" => $phone,
                "email" => $email,
                "address" => $address,
                "location" => $location,
                "role" => $role,
                "last_updated_datetime" => $last_updated_datetime,
                "creation_date" => $creation_date
        
            );
        
        }
    
        return $res = $return_error ? $return_error : $data;

    } catch (\Throwable $th) {
        echo $th;
    }

}



function get_user_where($var) {

    try {

        global $link;
    
        $id = null;
        $first_name = null;
        $last_name = null;
        $phone  = null;
        $email = null;
        $password = null;
        $address = null;
        $location = null;
        $role = null;
        $last_updated_datetime = null;
        $creation_date = null;
        $return_error = true;
    
        $sql = 'SELECT * FROM users WHERE email = ?';
        $stmnt = $link->prepare($sql);
        $stmnt->bind_param("s", $var);
        $stmnt->execute();
        $stmnt->bind_result(
            $id,
            $first_name,
            $last_name,
            $phone,
            $email,
            $password,
            $address,
            $location,
            $role,
            $last_updated_datetime,
            $creation_date
        );
    
        while ($stmnt->fetch()) {
    
            $return_error = false;
            $data[] = array(
          
                "id" => $id,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "phone" => $phone,
                "email" => $email,
                "address" => $address,
                "location" => $location,
                "role" => $role,
                "last_updated_datetime" => $last_updated_datetime,
                "creation_date" => $creation_date
        
            );
        
        }
    
        return $res = $return_error ? $return_error : $data;

    } catch (\Throwable $th) {
        echo $th;
    }

}

//$stmnt->close();

?>