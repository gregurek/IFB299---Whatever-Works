<?php
	include '../includes/header.php';
?>

<h1>List A Book</h1>

<form action='../pages/listabook-processing.php' method='post' id='listabook'>

	<label>Book Title</label><input type='text'></input><div class='clearfix'></div>
	<label>Author</label><input type='text'></input><div class='clearfix'></div>
	<label>Edition</label><input type='text'></input><div class='clearfix'></div>
	<input class='button' type='submit' name='submit' form='listabook'><div class='clearfix'></div>
	
</form>

<?php
	include '../includes/footer.php';
?>