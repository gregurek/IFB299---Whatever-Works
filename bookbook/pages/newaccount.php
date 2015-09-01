<?php
	include '../includes/header.php';
?>

<h1>Create Account</h1>

<form action='../pages/newaccount-processing.php' method='post' id='newaccount'>

	<label>QUT Email Address</label><input type='text'></input><div class='clearfix'></div>
	<label>Password</label><input type='password'></input><div class='clearfix'></div>
	<label>Re-Enter Password</label><input type='password'></input><div class='clearfix'></div>
	<input class='button' type='submit' name='submit' form='newaccount'><div class='clearfix'></div>
	
</form>

<?php
	include '../includes/footer.php';
?>