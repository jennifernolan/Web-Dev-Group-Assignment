<!--Once user has logged in they go to this page. Add a "My Books" area where the user can add books to a wishlist to read.-->
<?php
	session_start();
	if($_SESSION["firstname"] == null && $_SESSION["lastname"] == null &&
	$_SESSION["emailname"] == null && $_SESSION["password"] == null)
	{
		header('location:LoginPage.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
		
		<title>The Library</title>
	</head>
	
	<body>
		<script src="Scripts/site.js"></script>
		<div id="main">
			<header>
				<img src="Images/library.jpg" alt="library"/>
			</header>
			
			<nav>
				<ul>
					<li><a href="HomePage.html">Home</a></li>
					<li><a href="SearchPage.html">Search</a></li>
					<li><a href="LoginPage.php">Log in</a></li>
					<li><a href="SignupPage.php">Become a member</a></li>
					<li><a href="ProfilePage.php">Your profile</a></li>
				</ul>
			</nav>
			
			<div id="content">
				<section class="contentSection">
					<h1>WELCOME TO YOUR PROFILE</h1>
					
					<?php 
						require 'DbConnection/connection.php';
						$query = "SELECT UploadedImage FROM Users";
						$statement = $conn->query($query);
						$result = $statement->fetchAll(PDO::FETCH_COLUMN);
						
						$query2 = "SELECT Email FROM Users";
						$statement2 = $conn->query($query2);
						$result2 = $statement2->fetchAll(PDO::FETCH_COLUMN);
						
						$total = $statement->rowCount();
						
						for($count = 0; $count < $total; $count++)
						{
							if($result2[$count] == $_SESSION["emailname"])
							{
								$upload = $result[$count];
							}
						}
					?>
					
					<br>
					<img id="uploadedImage" alt="Uploaded Image" src="<?php echo $upload;?>">
					<br>
					
					<form action="upload.php" method="post" enctype="multipart/form-data">
						Select an image to upload:
						<br>
						<br>
						<input type="file" name="fileToUpload" id="fileToUpload">
						<br>
						<br>
						<input type="submit" value="Upload Image" name="submit">
					</form>
					
					<br>
					<h2>My Books</h2>
					<br>
					
					<form action="Scripts/signout.php">
						<input type="submit" value="Sign Out">
					</form>
					
					<br>
					
					<form action="ResetPassword.php">
						<input type="submit" value="Reset your password">
					</form>
					
					<br>
					
					<form action="Scripts/deleteProfile.php">
						<input type="submit" value="Delete your profile">
					</form>
					
					<br>
					
				</section>
			</div>
			<footer>
				Site by: Jennifer Nolan &copy; 2018
			</footer>
		</div>
	</body>
</html>
