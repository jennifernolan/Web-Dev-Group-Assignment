<?php
	require '../DbConnection/connection.php';
	
	if(isset($_POST['submit']))
	{
		$stmt = $conn->prepare("INSERT INTO Users(Name, Email, DOB, Gender, Address1, Address2, City, ZipCode, Password) values (:name,:email,:dob,:gender,:address1,:address2,:city,:zipcode,:password)");
	
		$stmt->bindParam(':name',$_POST['name_text']);
		$stmt->bindParam(':email',$_POST['email_text']);
		$stmt->bindParam(':dob',$_POST['date_picker']);
		$stmt->bindParam(':gender',$_POST['select_gender']);
		$stmt->bindParam(':address1',$_POST['addr1_text']);
		$stmt->bindParam(':address2',$_POST['addr2_text']);
		$stmt->bindParam(':city',$_POST['city_text']);
		$stmt->bindParam(':zipcode',$_POST['zip_text']);
		$stmt->bindParam(':password',$_POST['password_text']);
		
		if($stmt->execute())
		{
			echo "New records created successfully";
			header('location:../ProfilePage.php');
		}
	}
?>