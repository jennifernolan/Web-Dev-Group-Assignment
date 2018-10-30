<?php
	require '../DbConnection/connection.php';
	
	session_start();
	$_SESSION["firstname"] = $_POST['firstname_text'];
	$_SESSION["lastname"] = $_POST['lastname_text'];
	$_SESSION["emailname"] = $_POST['email_text'];
	$_SESSION["password"] = $_POST['password_text'];
	
	if(isset($_POST['submit']))
	{
		$stmt = $conn->prepare("INSERT INTO Users(FirstName, LastName, Email, DOB, Gender, Address1, Address2, City, ZipCode, Password) values (:firstname, :lastname, :email,:dob,:gender,:address1,:address2,:city,:zipcode,:password)");
	
		$stmt->bindParam(':firstname',$_POST['firstname_text']);
		$stmt->bindParam(':lastname',$_POST['lastname_text']);
		$stmt->bindParam(':email',$_POST['email_text']);
		$stmt->bindParam(':dob',$_POST['date_picker']);
		$stmt->bindParam(':gender',$_POST['select_gender']);
		$stmt->bindParam(':address1',$_POST['addr1_text']);
		$stmt->bindParam(':address2',$_POST['addr2_text']);
		$stmt->bindParam(':city',$_POST['city_text']);
		$stmt->bindParam(':zipcode',$_POST['zip_text']);
		$stmt->bindParam(':password',password_hash($_POST['password_text'], PASSWORD_DEFAULT));
		
		if($stmt->execute())
		{
			//echo "New records created successfully";
			header('location:../ProfilePage.php');
		}
	}
?>