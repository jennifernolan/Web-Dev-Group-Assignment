<?php 
	require '../DbConnection/connection.php';
	
	session_start();
	$email = $_SESSION["emailname"];
	
	$stmt = $conn->prepare("DELETE FROM Users WHERE Email = '$email'");
	$stmt->execute();
	
	session_unset();
	session_destroy();
	header('location:../SignupPage.php');
?>