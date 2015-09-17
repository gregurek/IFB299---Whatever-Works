<?php
	include '../includes/header.php';
?>
			<h1>List A Book</h1>
			<h2>To list a textbook enter in the books Title, Author and the Edition. When submitted the book will be shown in the results page. Please check your emails daily as that is how another student will contact you.</h2>
			<?php
				if(isset($_SESSION['error'])) {
					echo '<p class="error">' . $_SESSION['error'] . '</p>';
					unset($_SESSION['error']);
				} elseif(isset($_SESSION['success'])) {
					echo '<p class="success">' . $_SESSION['success'] . '</p>';
					unset($_SESSION['success']);
				}
			?>

			<form action="../pages/listabook-processing.php" method="post" id="listabook">
				<label>Book Title:</label><input type="text" name="title"><div class="clearfix"></div>
				<label>Author:</label><input type="text" name="author"><div class="clearfix"></div>
				<label>Edition:</label><input type="text" name="edition"><div class="clearfix"></div>
				<input class="button" type="submit" name="submit" form="listabook"><div class="clearfix"></div>
			</form>
<?php
	include '../includes/footer.php';
?>