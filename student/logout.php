<?php 
session_start();
unset($_SESSION['sess_user_s']);
session_destroy();
header("Location:../index.php");
?>
