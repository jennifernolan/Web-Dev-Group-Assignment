<!-- Page that allows the user to reset their password -->
<!DOCTYPE html>
<html>
	<head>
		<title>The Library</title>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
	</head>
	
	<body>
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
					<h1>RESET YOUR PASSWORD</h1>
					<br>
					
					<!-- form for the user to submit their new password and update their details in the database -->
					<form action="Scripts/resetPassword.php" method="post" name="personal_info" id="personal_info">
						<table align="center" border="0"><tbody>
							<tr>
								<td class="name">
									Password:
								</td>
								<td class="data">
									<input type="password" name="password_text" id="password_text" width="6" size="6" maxlength="20" required>
								</td>
							</tr>
							<tr>
								<td class="name">
									<input type="submit" value="Reset" id="reset" name="reset"> 
								</td>
							</tr>
						</tbody></table>
					</form>
				</section>
			</div>
			
			<footer>
				Site by: Jennifer Nolan &copy; 2018
			</footer>
		</div>
	</body>
</html>
