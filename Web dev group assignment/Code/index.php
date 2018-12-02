<!DOCTYPE html>
<html>
	<head>
		<title>The Library</title>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	
	<body>
		<div id="main">
			<header>
				<img src="Images/library.jpg" alt="library"/>
			</header>
			
			<!--Menu navigation bar at top of page-->
			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="Webpages/SearchPage.php">Search</a></li>
					<li><a href="Webpages/LoginPage.php">Log in</a></li>
					<li><a href="Webpages/SignupPage.php">Become a member</a></li>
					<li><a href="Webpages/ProfilePage.php">Your profile</a></li>
				</ul>
			</nav>
			
			<div id="content">
				<section class="contentSection">
					<h1>WELCOME TO THE LIBRARY SITE!</h1>
					<br>
					
					<p>
					<img id="textImg" src="Images/StackOfBooks.jpg" alt="A stack of books"/>
					<b>Welcome to the Library Site.</b> Please use the search, indicated in the navigation bar as "Search", to view our listing of books. 
					<br>
					<br>
					<b>Already a member? </b>Log in on our "Log In" page to add books to your "My Books" list on your profile. Or upload a profile picture to your profile. 
					<br>
					<br>
					<b>Not a member? </b>Sign up to the Library Site on our "Become a member page" and start adding books you would like to read to your "My Books" list on your profile. 
					</p>
					
					<br>
					
					<!-- Carousel images using bootstrap. Carousel structure adapted from w3schools -->
					<div class="container">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
						
							<ol class="carousel-indicators">
							  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							  <li data-target="#myCarousel" data-slide-to="1"></li>
							  <li data-target="#myCarousel" data-slide-to="2"></li>
							  <li data-target="#myCarousel" data-slide-to="3"></li>
							  <li data-target="#myCarousel" data-slide-to="4"></li>
							</ol>
						
							<div class="carousel-inner">
								<div class="item active">
									<img id="carosel" src="Images/StackOfBooks.jpg">
								</div>
								
								<div class="item">
									<img id="carosel" src="Images/library2.jpg">
								</div>
								
								<div class="item">
									<img id="carosel" src="Images/book.jpg">
								</div>
								
								<div class="item">
									<img id="carosel" src="Images/penandpaper.jpg">
								</div>
								
								<div class="item">
									<img id="carosel" src="Images/Books.jpg">
								</div>
							</div>
						</div>
					</div>
					
					<br>
					<br>
				</section>
			</div>
			
			<footer>
				Site by: Jennifer Nolan &copy; 2018
			</footer>
		</div>
	</body>
</html>
