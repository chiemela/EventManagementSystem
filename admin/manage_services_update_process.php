<?php
// start session
session_start();
// Include config file
require_once "../config.php";

if(!empty($_GET["id"])){
    $id = $_GET["id"];
}
$service_name = $_POST['service_name'];
$service_cost = $_POST['service_cost'];
$service_availability_status = $_POST['service_availability_status'];

// import API
include "./api/updateServices.php";
// check if file exists
if($_FILES["image"]["error"] == 4){
    echo "
        <script> alert('Image Does Not Exist'); </script>
    ";
}
// continue if file exists
else{
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    // check if file extension is supported
    if (!in_array($imageExtension, $validImageExtension)){
        $error_message = 'Invalid Image Extension';
        // Redirect user to welcome page
        $URL_redirect = "./manage_services_update.php?id=$id&error=$error_message";
        header("location: ".$URL_redirect);
    }
    // check if file size is more than 2MB
    else if($fileSize > 2000000){
        $error_message = 'Image size should not be more than 2MB';
        // Redirect user to welcome page
        $URL_redirect = "./manage_services_update.php?id=$id&error=$error_message";
        header("location: ".$URL_redirect);
    }
    // if all conditoins are met then post into databse
    else{
        date_default_timezone_set('Europe/London'); // Get the current datetime for London
        $date = date('Y-m-d H:i:s'); // Get the current date
        $var1 = $_POST["service_name"];
        $var2 = $_POST["service_cost"];
        // thie function "uniqid()" generates custom ID from the dateTimeSeconds
        $var3 = uniqid();
        $var3 .= '.' . $imageExtension;
        $var4 = $_POST["service_availability_status"];
        $var5 = $date;
        $var6 = $id;
        move_uploaded_file($tmpName, '../images/' . $var3);
        // if all check are without errors then update data in the database
        update_services($var1, $var2, $var3, $var4, $var5, $var6);
    }
}

?>