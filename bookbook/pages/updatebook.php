<?php
	include '../includes/header.php';
	
	$sql = "select * from book where bookid=" . $_SESSION['bookid'];
	$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
	$book = mysqli_fetch_array($result);
?>
			<h1>Update Book</h1>
			<?php
				if(isset($_SESSION['error'])) {
					echo '<p class="error">' . $_SESSION['error'] . '</p>';
					unset($_SESSION['error']);
				} elseif(isset($_SESSION['success'])) {
					echo '<p class="success">' . $_SESSION['success'] . '</p>';
					unset($_SESSION['success']);
				}
			?>

			<form action="../pages/updatebook-processing.php" method="post" id="updatebook">
				<label>Book Title:</label><input type="text" name="title" value="<?php echo $book['title']; ?>"><div class="clearfix"></div>
				<label>Author:</label><input type="text" name="author" value="<?php echo $book['author']; ?>"><div class="clearfix"></div>
				<label>Edition:</label><input type="text" name="edition" value="<?php echo $book['edition']; ?>"><div class="clearfix"></div>
				<label>Condition:</label><select name="bookcondition"><option value="Brand New">Brand New</option><option value="Slightly Worn">Slightly Worn</option><option value="Well Worn">Well Worn</option></select><div class="clearfix"></div>
				<input class="button" type="submit" name="submit" form="updatebook" value="Update Information"><div class="clearfix"></div>
			</form>
			<form action="../pages/updatebookimage-processing.php" method="post" id="updatebookimage" enctype="multipart/form-data">
				<img src="../images/books/<?php echo $book['image']; ?>" alt="Display Image for this book." height="114px" width="114px">
				<label>Cover Image</label><input type="file" name="image"><div class="clearfix"></div>
				<input class="button" type="submit" name="submit" form="updatebookimage" value="Update Image"><div class="clearfix"></div>
			</form>
<?php
	include '../includes/footer.php';
?>