<?php
	require '../DbConnection/connection.php';
	
	//set the session using the user input from the form
	session_start();
	$_SESSION["firstname"] = $_POST['firstname_text'];
	$_SESSION["lastname"] = $_POST['lastname_text'];
	$_SESSION["emailname"] = $_POST['email_text'];
	$_SESSION["password"] = $_POST['password_text'];
	
	if(isset($_POST['submit']))
	{
		$error = 0;
		if (!preg_match("/^[a-zA-Z ]*$/",$_POST['firstname_text'])) {
		    $error = 1;	  
		}
		if (!preg_match("/^[a-zA-Z ]*$/",$_POST['lastname_text'])) {
		    $error = 1;	  
		}
		if (!preg_match("/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/",$_POST['email_text'])) {
		    $error = 1;	  
		}
		if ($_POST['select_gender'] == "None") {
			$error = 1;
		}
		if (!preg_match("/^[a-zA-Z ]*$/",$_POST['city_text'])) {
		    $error = 1;	  
		}
		if (!preg_match("/^[a-zA-Z]+[0-9]+[0-9]+\s+[a-zA-Z]+[a-zA-Z]+[0-9]+$/",$_POST['zip_text'])) {
		    $error = 1;	  
		}
		if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/",$_POST['password_text'])) {
		    $error = 1;	  
		}
		//if the form is submitted and valid input is given insert the users details into a new row in the database
		$stmt = $conn->prepare("INSERT INTO Users(FirstName, LastName, Email, DOB, Gender, Address1, Address2, City, ZipCode, Password) values (:firstname, :lastname, :email,:dob,:gender,:address1,:address2,:city,:zipcode,:password)");
	
		//use bindParam to avoid an SQL injection attack
		$stmt->bindParam(':firstname',$_POST['firstname_text']);
		$stmt->bindParam(':lastname',$_POST['lastname_text']);
		$stmt->bindParam(':email',$_POST['email_text']);
		$stmt->bindParam(':dob', $_POST['date_picker']);
		$stmt->bindParam(':gender',$_POST['select_gender']);
		$stmt->bindParam(':address1',$_POST['addr1_text']);
		$stmt->bindParam(':address2',$_POST['addr2_text']);
		$stmt->bindParam(':city',$_POST['city_text']);
		$stmt->bindParam(':zipcode',$_POST['zip_text']);
		$stmt->bindParam(':password',password_hash($_POST['password_text'], PASSWORD_DEFAULT));
		
		//if the statement executes correctly it will bring the user to their profile page
		if($error == 0)
		{
			if($stmt->execute())
			{
				//echo "New records created successfully";
				header('location:../Webpages/ProfilePage.php');
			}
		}
		else
		{
			header('location:../Webpages/SignupPage.php');
		}
	}
?>