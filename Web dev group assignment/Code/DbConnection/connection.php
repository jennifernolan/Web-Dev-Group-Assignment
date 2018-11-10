<?php
	//code to connect to the database through the localhost 127.0.0.1
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "mydb";
	
	//try to connect to the database
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