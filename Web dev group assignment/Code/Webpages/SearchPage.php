<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];// search in all table columns
    $query = "SELECT * FROM `books` WHERE CONCAT(`PublishYear`, `Title`, `Author`) LIKE '%".$valueToSearch."%'";// using concat mysql function
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `books`";
    $search_result = filterTable($query);
}

function filterTable($query)// function to connect and execute the query
{
    $connect = mysqli_connect("localhost", "root", "", "mydb");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"><!--used to format the datepicker-->
		
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<title>The Library</title>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../CSS/stylesheet.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	
	<body>
		<div id="main">
			<header>
				<img src="../Images/library.jpg" alt="library"/>
			</header>
			
			<nav>
				<ul>
					<li><a href="../index.php">Home</a></li>
					<li><a href="SearchPage.php">Search</a></li>
					<li><a href="LoginPage.php">Log in</a></li>
					<li><a href="SignupPage.php">Become a member</a></li>
					<li><a href="ProfilePage.php">Your profile</a></li>
				</ul>
			</nav>
    <head>
	<div id="content">
				<section class="contentSection">
        <title>Book Search</title>

    </head>
       <div id="content">
			<section class="contentSection">
				<form action="SearchPage.php" method="post" style="margin-left:40%;">
					<input type="text" name="valueToSearch" placeholder="Search Books..."><br><br>
					<input type="submit" name="search" value="Filter"><br><br>
				</form> 
					<table border="1" align="center">
						<tr>
							<th>Publish Year</th>
							<th>Title</th>
							<th>Author</th>
						</tr>

						<!-- populate table from mysql database -->
						<?php while($row = mysqli_fetch_array($search_result)):?>
						<tr>
							<td><?php echo $row['PublishYear'];?></td>
							<td><?php echo $row['Title'];?></td>
							<td><?php echo $row['Author'];?></td>
						</tr>
						<?php endwhile;?>
					</table>
				<br>
			</section>
		</div>
		<footer>
				&copy; 2018
		</footer>
	</div>
    </body>
</html>