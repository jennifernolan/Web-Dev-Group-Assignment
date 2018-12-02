<?php
	require '../DbConnection/connection.php';
	
	//get the user input
	$firstname = $_POST['firstname_text'];
	$lastname = $_POST['lastname_text'];
	$email = $_POST['email_text'];
	$password = $_POST['password_text'];
	
	//set the user input into the session
	session_start();
	$_SESSION["firstname"] = $firstname;
	$_SESSION["lastname"] = $lastname;
	$_SESSION["emailname"] = $email;
	$_SESSION["password"] = $password;
	
	if(isset($_POST['login']))
	{
		try
		{
			//query each element from the users input against the database to make sure they are a valid user
			//do this by compare the user input with the information stored in the database
			$query1 = "Select FirstName FROM Users";
			$query2 = "Select LastName FROM Users";
			$query3 = "Select Email FROM Users";
			$query4 = "Select Password FROM Users";
			$statement1 = $conn->query($query1);
			$statement2 = $conn->query($query2);
			$statement3 = $conn->query($query3);
			$statement4 = $conn->query($query4);
			$resultsArray1 = $statement1->fetchAll(PDO::FETCH_COLUMN);
			$resultsArray2 = $statement2->fetchAll(PDO::FETCH_COLUMN);
			$resultsArray3 = $statement3->fetchAll(PDO::FETCH_COLUMN);
			$resultsArray4 = $statement4->fetchAll(PDO::FETCH_COLUMN);
			
			$query = "SELECT * FROM Users";
			$statement = $conn->prepare($query);
			$statement->execute();
			$total = $statement->rowCount();
			
			$successful = 0;
			
			for($count = 0; $count <= $total; $count++)
			{
				//if they are successful redirect them to their profile
				$pass = password_verify($password, $resultsArray4[$count]);
				if($resultsArray1[$count] == $firstname && $resultsArray2[$count] == $lastname && $resultsArray3[$count] == $email && $pass == true)
				{
					$successful = 1;
					header('location:../Webpages/ProfilePage.php');
				}
			}
			
			//if they are not a valid user redirect them back to the login page
			if($successful == 0)
			{
				header('location:../Webpages/LoginPage.php');
			}
		}
		catch(PDOException $e)
		{
			echo "ERROR: " .$e->getMessage();
		}
	}
?>