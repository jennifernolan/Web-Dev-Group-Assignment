<?php
	/*need to include a PASSWORD */
	require '../DbConnection/connection.php';
	
	$firstname = $_POST['firstname_text'];
	$lastname = $_POST['lastname_text'];
	$email = $_POST['email_text'];
	
	if(isset($_POST['login']))
	{
		try
		{
			$query1 = "Select FirstName FROM Users";
			$query2 = "Select LastName FROM Users";
			$query3 = "Select Email FROM Users";
			$statement1 = $conn->query($query1);
			$statement2 = $conn->query($query2);
			$statement3 = $conn->query($query3);
			$resultsArray1 = $statement1->fetchAll(PDO::FETCH_COLUMN);
			$resultsArray2 = $statement2->fetchAll(PDO::FETCH_COLUMN);
			$resultsArray3 = $statement3->fetchAll(PDO::FETCH_COLUMN);
			
			$query = "SELECT * FROM Users";
			$statement = $conn->prepare($query);
			$statement->execute();
			$total = $statement->rowCount();
			
			$successful = 0;
			
			for($count = 0; $count <= $total; $count++)
			{
				if($resultsArray1[$count] == $firstname && $resultsArray2[$count] == $lastname && $resultsArray3[$count] == $email)
				{
					$successful = 1;
					header('location:../ProfilePage.php');
				}
			}
			
			if($successful == 0)
			{
				header('location:../LoginPage.php');
			}
		}
		catch(PDOException $e)
		{
			echo "ERROR: " .$e->getMessage();
		}
	}
?>