<?php
	include '../includes/header.php';
?>

<h1>Create Account</h1>
<h2>Please enter a valid Qut Email address.</h2>

<?php
	if(isset($_SESSION['error'])) {
		echo '<p class="error">' . $_SESSION['error'] . '</p>';
		unset($_SESSION['error']);
	} elseif(isset($_SESSION['success'])) {
		echo '<p class="success">' . $_SESSION['success'] . '</p>';
		unset($_SESSION['success']);
	}
?>

<form action='../pages/newaccount-processing.php' method='post' id='newaccount'>

	<label>QUT Email Address</label><input type='text' name='email'></input><div class='clearfix'></div>
	<label>Password</label><input type='password' name='password'></input><div class='clearfix'></div>
	<label>Re-Enter Password</label><input type='password' name='passwordcheck'></input><div class='clearfix'></div>
	<input class='button' type='submit' name='submit' form='newaccount'><div class='clearfix'></div>
	
</form>

<?php
	include '../includes/footer.php';
?>