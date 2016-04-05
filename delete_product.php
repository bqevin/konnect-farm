<?php
session_start();
include("includes/connection.php");
include("includes/functions.php");


if (isset($_GET['id'])) {
	$id = $_GET['id'];
}

 $delete_q = "DELETE FROM products WHERE id = $id";
 $delete_r = mysqli_query($connection,$delete_q);

 if (!$delete_q) {
 	$_SESSION["delete_success"] = 2;
 	header("Location: myproducts.php");
 }else{
 	$_SESSION["delete_success"] = 1;
 	header("Location: myproducts.php");	
 }
 

?>