<?php
// start session
session_start();
// Include config file
require_once "../config.php";

if(!empty($_GET["email_id"])){
    $email_id = $_GET["email_id"];
    include "./api/deleteUser.php";
    delete_user($email_id);
}
?>