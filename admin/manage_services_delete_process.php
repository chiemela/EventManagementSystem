<?php
// start session
session_start();
// Include config file
require_once "../config.php";

if(!empty($_GET["id"])){
    $id = $_GET["id"];
    include "./api/deleteServices.php";
    delete_services($id);
}
?>