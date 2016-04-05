<?php 

	function page_restrict(){

    	if (empty($_SESSION['email']) && empty($_SESSION['id'])) {
        header("Location:login.php");
	}
}
?>