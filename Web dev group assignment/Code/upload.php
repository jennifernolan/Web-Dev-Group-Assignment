<?php
	/*code from w3schools php file upload: https://www.w3schools.com/php/php_file_upload.asp */
	
	require 'DbConnection/connection.php';
	
	session_start();
	$email = $_SESSION["emailname"];
	
	$target_dir = "Uploads/"; //Specifies the directory where the image is going to be placed
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); //specifies the path of the file to be uploaded
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));//holds the file extension of the file in lower case
	
	//check if image file is an actual image o
	if(isset($_POST["submit"]))
	{
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false)
		{
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		}
		else
		{
			echo "File is not an image.";
			header('location:ProfilePage.php');
			$uploadOk = 0;
		}
	}
	
	//check if file already exists
	if(file_exists($target_file))
	{
		echo "Sorry, file already exists";
		$_SESSION["uploadedimage"] = $target_file;
		header('location:ProfilePage.php');
		$uploadOk = 0;
	}
	
	//check file size
	if($_FILES["fileToUpload"]["size"] > 500000)
	{
		echo "Sorry, your file is too large";		
		header('location:ProfilePage.php');
		$uploadOk = 0;
	}
	
	//Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
	{
		echo "Sorry, only JPG, JPEG, PNG and GIF files are allowed.";	
		header('location:ProfilePage.php');
		$uploadOk = 0;
	}
	
	//check if $uploadOk is set to 0 by an error
	if($uploadOk == 0)
	{
		echo "Sorry, your file was not uploaded";
		header('location:ProfilePage.php');
		//if everything is ok, try to upload file
	}
	else
	{
		//update the database with the file path of the picture and update the profile page
		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
		{
			$stmt = $conn->prepare("UPDATE users SET UploadedImage='$target_file' WHERE Email='$email'");
			$stmt->execute();
			$_SESSION["uploadedimage"] = $target_file;
			header('location:ProfilePage.php');
		}
		else
		{
			echo "Sorry, there was an error uploading your file";
			$_SESSION["uploadedimage"] = $target_file;
			header('location:ProfilePage.php');
		}
	}
?>