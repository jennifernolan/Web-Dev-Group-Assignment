<?php 
	require '../DbConnection/connection.php';
	
	//delete a user by getting their email from the seesion, because email is unique to each user, and delete their info from the database
	session_start();
	$email = $_SESSION["emailname"];
	
	$stmt = $conn->prepare("DELETE FROM Users WHERE Email = '$email'");
	$stmt->execute();
	
	
	
	//destroy all the session info and go back to the signup page
	session_unset();
	session_destroy();
	header('location:../Webpages/SignupPage.php');
?>