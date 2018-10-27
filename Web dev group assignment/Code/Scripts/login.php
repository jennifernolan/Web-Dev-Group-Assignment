<?php
	/*need to include a PASSWORD */
	/*works but can login even if not in database*/
	require '../DbConnection/connection.php';
	
	$firstname = $_POST['firstname_text'];
	$lastname = $_POST['lastname_text'];
	$email = $_POST['email_text'];
	
	if(isset($_POST['login']))
	{
		try
		{
			$stmt = $conn->prepare("Select * FROM Users WHERE FirstName='$firstname' and LastName='$lastname' and Email='$email'");
		
			if($stmt->execute())
			{
				echo "Login Successful";
				//header('location:../ProfilePage.php');
			}
			else
			{
				echo "login unsuccessful";
			}
		}
		catch(PDOException $e)
		{
			echo "ERROR: " .$e->getMessage();
		}
	}
	else
	{
		echo "unsuccessful";
	}
?>