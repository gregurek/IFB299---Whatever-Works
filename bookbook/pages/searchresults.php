<?php
	include '../includes/header.php';
?>
			<h1>Search Results</h1>
			<h2>Current Search results listed below, to get a book please click on the User Email button and send  them an email.</h2>

<?php
	$search = $_GET['search'];
	
	$sql = "select title, author, edition, email, book.image, bookcondition from book join userbook on book.bookid = userbook.bookid join user on userbook.userid = user.userid where title like '%$search%'";
	$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
	$numresults = mysqli_num_rows($result);	
?>			
			<div class="results">
				<ul>
					<?php
						while($book = mysqli_fetch_array($result)) {
							echo "<li>\n\t\t\t\t\t\t";
							echo "<img src='../images/books/" . $book['image'] . "' alt='" . $book['title'] . " Cover Image' height='114' width='114'>";
							echo "<ul>\n\t\t\t\t\t\t\t";
							echo "<li>" . $book['title'] . "</li>\n\t\t\t\t\t\t\t";
							echo "<li>" . $book['author'] . "</li>\n\t\t\t\t\t\t\t";
							echo "<li>" . $book['edition'] . "&nbsp;</li>\n\t\t\t\t\t\t\t";
							echo "<li>" . $book['bookcondition'] . "&nbsp;</li>\n\t\t\t\t\t\t\t";
							echo "<li><a href='mailto:" . $book['email'] . "'>Borrow Me!</a></li>\n\t\t\t\t\t\t";
							echo "</ul>\n\t\t\t\t\t";
							echo "</li>\n\n\t\t\t\t\t";
							echo "<div class='clearfix'></div>";
						}
					?>
				</ul>
			</div>
			
			<div class="clearfix-spacer"></div>

			<p>Returned (<span class="bold"><?php echo $numresults ?></span>) Result(s) for your search of '<span class="bold"><?php echo $search ?></span>'.</p>
<?php
	include '../includes/footer.php';
?>