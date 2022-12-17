<?php
// start session
session_start();
$item_id = $_GET["id"];
$sending_url = $_GET["sending_url"];

if(!empty($_GET["date"])){
    $get_form_date = $_GET["date"];
    $get_form_time = $_GET["time"];
    $get_form_person = $_GET["person"];
}

$cart_argument = $_GET["cart_argument"];
if($cart_argument === "SET"){
    // check if selected item is already in the cart
    if(strpos($_SESSION["cart_items"], $item_id) !== false){
        $_SESSION["cart_error"] = "YES";
        $_SESSION["item_id"] = $item_id;
    } else {
        $_SESSION["cart_error"] = "NO";
        $_SESSION["item_id"] = $item_id;
        $_SESSION["cart_items"] .= $item_id.",";
    }
    $cart_items = "?cart_items=".$_SESSION["cart_items"];
    // Redirect user to sending_url page
    header("location: ".$sending_url.$cart_items.$cart_error);
}elseif($cart_argument === "REMOVE"){
    $old_cart_items = $_SESSION["cart_items"];
    $item_to_remove = $item_id.",";
    $_SESSION["cart_items"] = str_replace($item_to_remove, "", $old_cart_items);
    // Redirect user to sending_url page
    header("location: $sending_url?date=$get_form_date&time=$get_form_time&person=$get_form_person");
}
?>