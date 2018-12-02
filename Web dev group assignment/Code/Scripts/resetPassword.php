<?php 
	require '../DbConnection/connection.php';
	
	//make sure that the new password being entered meets the criteria of a password
	$error = 0;
	if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/",$_POST['password_text'])) 
	{
		//if the password does not meet the criteria alert the user and redirect to the profile page
		$error = 1;	
		echo "<script type='text/javascript'>alert('Invalid password format');</script>";
		echo 
		"<script>window.location.href = '../Webpages/ProfilePage.php';</script>";
	}
	
	if($error == 0)
	{
		//if the user is valid update the database and go back to the usersprofile page
		$password = password_hash($_POST['password_text'], PASSWORD_DEFAULT);

		session_start();
		$email = $_SESSION["emailname"];
		
		//update the specific users password details, found by using the users unique email, in the database
		$stmt = $conn->prepare("UPDATE Users SET Password = '$password' WHERE Email = '$email'");
		$stmt->execute();

		header('location:../Webpages/ProfilePage.php');
	}
	
?>