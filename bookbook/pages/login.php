<?php
	include '../includes/header.php';
?>
<style>
h2 {
	font-size: 13px;
}
</style>

<h1>Login</h1>
<h2>Please enter your account details.</h2>

<?php
	if(isset($_SESSION['error'])) {
		echo '<p class="error">' . $_SESSION['error'] . '</p>';
		unset($_SESSION['error']);
	}
?>

<form action='../pages/login-processing.php' method='post' id='login'>

	<label>QUT Email Address</label><input type='text' name='email'><div class='clearfix'></div>
	<label>Password</label><input type='password' name='password'><div class='clearfix'></div>
	<input class='button' type='submit' name='submit' form='login' value='Login'><div class='clearfix'></div>
	
</form>

<?php
	include '../includes/footer.php';
?>