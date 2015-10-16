<?php
	include '../includes/header.php';
	
	$sql="select * from book inner join userbook on book.bookid=userbook.bookid where userid=" . $_SESSION['user'];
	$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
?>
			<h1>Book Book Search</h1>
			<?php
				if(isset($_SESSION['error'])) {
					echo '<p class="error">' . $_SESSION['error'] . '</p>';
					unset($_SESSION['error']);
				} elseif(isset($_SESSION['success'])) {
					echo '<p class="success">' . $_SESSION['success'] . '</p>';
					unset($_SESSION['success']);
				}
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
							echo "<li><a href='mybooks-update.php?book=" . $book['bookid'] . "'>Update Information</a><a href='mybooks-delete.php?book=" . $book['bookid'] . "'>Remove Book</a></li>\n\t\t\t\t\t\t\t";
							echo "</ul>\n\t\t\t\t\t";
							echo "</li>\n\n\t\t\t\t\t";
							echo "<div class='clearfix'></div>\n\n\t\t\t\t\t";
						}
					?>
					
				</ul>
			</div>
<?php
	include '../includes/footer.php';
?>