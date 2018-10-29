<!--Once user has logged in they go to this page. Add a "My Books" area where the user can add books to a wishlist to read.-->
<!-- USER NEEDS TO LOGIN FIRST BEFORE BEING ABLE TO USE THIS PAGE-->
<?php
	session_start();
	//session_unset();
	if($_SESSION["firstname"] == null && $_SESSION["lastname"] == null &&
	$_SESSION["emailname"] == null && $_SESSION["password"] == null)
	{
		header('location:LoginPage.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
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
					<br>
					<?php require 'DbConnection/connection.php';?>
					<form action="upload.php" method="post" enctype="multipart/form-data">
						Select an image to upload:
						<br>
						<br>
						<input type="file" name="fileToUpload" id="fileToUpload">
						<br>
						<br>
						<input type="submit" value="Upload Image" name="submit">
					</form>
					<img alt="Uploaded Image" src="<?php echo $_SESSION['uploadedimage']?>" height=200 width=300/>
				</section>
			</div>
			
			<footer>
				Site by: Jennifer Nolan &copy; 2018
			</footer>
		</div>
	</body>
</html>
