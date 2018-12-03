<?php
	//connect to the database
	require '../DbConnection/connection.php';

	//once the user submits their search do the following
	if(isset($_POST['searchSubmit']))
	{
		//gather the text input from search field
		$text = $_POST['user_input'];
		//if the user is searching using the authors name access the database using the author column as a comparison
		if($_POST['select_book'] == "Author")
		{
			//select each part of column of the database depending on the authors name entered
			$authorquery = "SELECT Author FROM booksearch WHERE Author LIKE '%$text%' ORDER BY Author ASC";
			$titlequery = "SELECT Title FROM booksearch WHERE Author LIKE '%$text%' ORDER BY Author ASC";
			$imagequery = "SELECT BookCover FROM booksearch WHERE Author LIKE '%$text%' ORDER BY Author ASC";
			
			$authorstate = $conn->query($authorquery);
			$titlestate = $conn->query($titlequery);
			$imagestate = $conn->query($imagequery);
			
			$authorrows = $authorstate->fetchAll(PDO::FETCH_COLUMN);
			$titlerows = $titlestate->fetchAll(PDO::FETCH_COLUMN);
			$imagerows = $imagestate->fetchAll(PDO::FETCH_COLUMN);
			$_SESSION['authorrows'] = $authorrows;
			$_SESSION['titlerows'] = $titlerows;
						
			//get the number of rows returned from one of the querys executed above
			$total = $authorstate->rowCount();
			$_SESSION['total'] = $total;
			
			if($total > 0)
			{
				//display the query resuls in a table onto the searchPage.php
				echo "<table border='1' align='center'>";
				echo "<tr><th><b>Author</b></th><th><b>Title</b></th><th><b>Book Cover</b></th></tr>";
				for($count = 0; $count < $total; $count++)
				{
					$author = $authorrows[$count];
					$_SESSION['author'] = $author;
					$title= $titlerows[$count];
					$_SESSION['title'] = $title;
					$image = $imagerows[$count];
					echo "<tr><td>" .$author. "</td><td>".$title. "</td><td><img src='" .$image. "'></td></tr>";
				}
				echo "</table>";
				echo "<br>";
				//a button to add the list of books to the users favourites list
				echo "<form action='../Scripts/addtofavs.php' method='post' style='margin-left: 50%;'><input type='submit'  value='Add to My Books' id='added' name='added'></form>";
			}
			if($total == 0)
			{
				//if there is no results found
				echo "<p align='center'><br>No results found</p>";
			}
		}
		//same as above except instead of searching based on the author now searching based on the title of the book
		if($_POST['select_book'] == "Title")
		{
			$authorquery = "SELECT Author FROM booksearch WHERE Title LIKE '%$text%' ORDER BY Author ASC";
			$titlequery = "SELECT Title FROM booksearch WHERE Title LIKE '%$text%' ORDER BY Author ASC";
			$imagequery = "SELECT BookCover FROM booksearch WHERE Title LIKE '%$text%' ORDER BY Author ASC";
			
			$authorstate = $conn->query($authorquery);
			$titlestate = $conn->query($titlequery);
			$imagestate = $conn->query($imagequery);
			
			$authorrows = $authorstate->fetchAll(PDO::FETCH_COLUMN);
			$titlerows = $titlestate->fetchAll(PDO::FETCH_COLUMN);
			$imagerows = $imagestate->fetchAll(PDO::FETCH_COLUMN);
			$_SESSION['authorrows'] = $authorrows;
			$_SESSION['titlerows'] = $titlerows;
			
			$total = $titlestate->rowCount();
			$_SESSION['total'] = $total;
			
			if($total > 0)
			{
				echo "<table border='1'>";
				echo "<tr><th><b>Author</b></th><th><b>Title</b></th><th><b>Book Cover</b></th></tr>";
				for($count = 0; $count < $total; $count++)
				{
					$author = $authorrows[$count];
					$_SESSION['author'] = $author;
					$title= $titlerows[$count];
					$_SESSION['title'] = $title;
					$image = $imagerows[$count];
					echo "<tr><td>" .$author. "</td><td>".$title. "</td><td><img src='" .$image. "'></td></tr>";
				}
				echo "</table>";
				echo "<br>";
				echo "<form action='../Scripts/addtofavs.php' method='post' style='margin-left: 50%'><input type='submit' value='Add to My Books' id='added' name='added'></form>";
			}
			if($total == 0)
			{
				echo "<p align='center'><br>No results found</p>";
			}
		}
	}
?>