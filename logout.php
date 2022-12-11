<?php
// start session
session_start();
// Destroying session
session_destroy();
header("location: index.php");
exit;

?>