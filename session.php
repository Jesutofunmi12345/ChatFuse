<?php
	
	session_start();

	function logged_in(){
		return isset($_SESSION['user']);
	}
	
	function confirm_logged_in(){
		if (!logged_in()) {

			header("location:access-denied.php");
		}
	}

?>