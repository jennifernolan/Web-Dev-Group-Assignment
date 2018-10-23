<?php
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "myDB";
		
	try
	{
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		//Set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connected successfully";
	}
	catch(PDOException $e)
	{
		echo "Connection failed: " .$e->getMessage();
	}
?>