<?php
// start session
session_start();
// Include config file
require_once "../config.php";

if(!empty($_GET["id"])){
    $id = $_GET["id"];
}

// import API
include "./api/updateUsers.php";

// if all conditoins are met then post into databse
date_default_timezone_set('Europe/London'); // Get the current datetime for London
$date = date('Y-m-d H:i:s'); // Get the current date
$var1 = $_POST['first_name'];
$var2 = $_POST['last_name'];
$var3 = $_POST['phone'];
$var4 = $_POST['address'];
$var5 = $_POST['location'];
$var6 = $date;
$var7 = $id;
// if all check are without errors then update data in the database
update_users($var1, $var2, $var3, $var4, $var5, $var6, $var7);


?>