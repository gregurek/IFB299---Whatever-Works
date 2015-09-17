<?php
	include '../includes/header.php';
?>
			<h1>Create Account</h1>
			<h2>Please enter a valid QUT email address.</h2>
			<?php
				if(isset($_SESSION['error'])) {
					echo '<p class="error">' . $_SESSION['error'] . '</p>';
					unset($_SESSION['error']);
				} elseif(isset($_SESSION['success'])) {
					echo '<p class="success">' . $_SESSION['success'] . '</p>';
					unset($_SESSION['success']);
				}
			?>

			<form action="../pages/newaccount-processing.php" method="post" id="newaccount" enctype="multipart/form-data">
				<label>QUT Email Address</label><input type="text" name="email"><div class="clearfix"></div>
				<label>Password</label><input type="password" name="password"><div class="clearfix"></div>
				<label>Re-Enter Password</label><input type="password" name="passwordcheck"><div class="clearfix"></div>
				<label>First Name</label><input type="text" name="firstname"><div class="clearfix"></div>
				<label>Last Name</label><input type="text" name="lastname"><div class="clearfix"></div>
				<label>Phone Number</label><input type="text" name="phonenumber"><div class="clearfix"></div>
				<label>Address</label><input type="text" name="address"><div class="clearfix"></div>
				<label>Profile Image</label><input type="file" name="image"><div class="clearfix"></div>
				<input class="button" type="submit" name="submit" form="newaccount"><div class="clearfix"></div>
			</form>
<?php
	include '../includes/footer.php';
?>