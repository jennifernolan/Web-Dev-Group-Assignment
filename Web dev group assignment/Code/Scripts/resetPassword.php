<?php 
	require '../DbConnection/connection.php';
	
	$password = password_hash($_POST['password_text'], PASSWORD_DEFAULT);
	
	session_start();
	$email = $_SESSION["emailname"];
	
	$stmt = $conn->prepare("UPDATE Users SET Password = '$password' WHERE Email = '$email'");
	$stmt->execute();

	header('location:../ProfilePage.php');
?>