<?php
/**
 * INSTRUCTIONS ON HOW TO USE THIS API: Paste the code below in the receiving file to access the email at [0] item. Use loop to iterate all items
 * include "./api/getUsers.php";
 * $users = get_users();
 * echo "<br>your address: ".$address = $users[0]["email"];
 */
function get_users() {

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

    return $data;

}

function get_user_where($email) {

    global $link;

    $id = null;
    $first_name = null;
    $last_name = null;
    $phone  = null;
    $email = null;
    $address = null;
    $location = null;
    $role = null;
    $last_updated_datetime = null;
    $creation_date = null;

    $sql = 'SELECT * FROM users WHERE email = ?';
    $stmnt = $link->prepare($sql);
    $stmnt->bind_param("s", $email);
    $stmnt->execute();
    $stmnt->bind_result(
        $id,
        $first_name,
        $last_name,
        $phone,
        $email,
        $address,
        $location,
        $role,
        $last_updated_datetime,
        $creation_date
    );

    while ($stmnt->fetch()) {

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

    return $data;

}

//$stmnt->close();

?>