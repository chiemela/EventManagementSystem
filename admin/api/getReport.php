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
function get_members() {

    try {

        global $link;
    
        $reg_no = null;
        $title = null;
        $first_name = null;
        $last_name  = null;
        $other_name = null;
        $acc_number = null;
        $phone = null;
        $email = null;
        $address_1 = null;
        $address_2 = null;
        $state = null;
        $gender = null;
        $next_of_kin = null;
        $next_of_kin_phone = null;
        $reg_date = null;
        $reg_by = null;
        $last_updated_day = null;
        $last_updated_month = null;
        $last_updated_year = null;
        $last_updated_datetime = null;
        $creation_date = null;
    
        $sql = 'SELECT * FROM members';
        $stmnt = $link->prepare($sql);
        $stmnt->execute();
        $stmnt->bind_result(
                        $reg_no,
                        $title,
                        $first_name,
                        $last_name ,
                        $other_name,
                        $acc_number,
                        $phone,
                        $email,
                        $address_1,
                        $address_2,
                        $state,
                        $gender,
                        $next_of_kin,
                        $next_of_kin_phone,
                        $reg_date,
                        $reg_by,
                        $last_updated_day,
                        $last_updated_month,
                        $last_updated_year,
                        $last_updated_datetime,
                        $creation_date
                    );
    
        while ($stmnt->fetch()) {
    
            $data[] = array(
          
                "acc_number" => $acc_number,
                "title" => $title,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "other_name" => $other_name
        
            );
        
        }
    
        return $data;

    } catch (\Throwable $th) {
        echo $th;
    }

}

function get_members_where($acc_number) {

    try {

        global $link;
    
        $reg_no = null;
        $title = null;
        $first_name = null;
        $last_name  = null;
        $other_name = null;
        // $acc_number = null; this is already passed in the function call
        $phone = null;
        $email = null;
        $address_1 = null;
        $address_2 = null;
        $state = null;
        $gender = null;
        $next_of_kin = null;
        $next_of_kin_phone = null;
        $reg_date = null;
        $reg_by = null;
        $last_updated_day = null;
        $last_updated_month = null;
        $last_updated_year = null;
        $last_updated_datetime = null;
        $creation_date = null;
    
        $sql = 'SELECT * FROM members WHERE acc_number = ?';
        $stmnt = $link->prepare($sql);
        $stmnt->bind_param("s", $acc_number);
        $stmnt->execute();
        $stmnt->bind_result(
                        $reg_no,
                        $title,
                        $first_name,
                        $last_name ,
                        $other_name,
                        $acc_number,
                        $phone,
                        $email,
                        $address_1,
                        $address_2,
                        $state,
                        $gender,
                        $next_of_kin,
                        $next_of_kin_phone,
                        $reg_date,
                        $reg_by,
                        $last_updated_day,
                        $last_updated_month,
                        $last_updated_year,
                        $last_updated_datetime,
                        $creation_date
                    );
    
        while ($stmnt->fetch()) {
    
            $data[] = array(
          
                "acc_number" => $acc_number,
                "title" => $title,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "other_name" => $other_name
        
            );
        
        }
    
        return $data;

    } catch (\Throwable $th) {
        echo $th;
    }

}

?>