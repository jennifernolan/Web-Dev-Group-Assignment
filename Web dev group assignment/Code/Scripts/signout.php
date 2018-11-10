<?php 
	//remove the session details when logging out so that a different user cannot log into somebody elses account
	session_start();
	session_unset();
	session_destroy();
	header('location:../LoginPage.php');
?>