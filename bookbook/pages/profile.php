<?php
	include '../includes/header.php';
	
	$user = $_SESSION['user'];
	$sql = "select * from user where userid = $user";
	$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
	$row = mysqli_fetch_array($result);
	$email = $row['email'];
	$oldpassword = $row['password'];
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$phonenumber = $row['phonenumber'];
	$address = $row['address'];
	$image = $row['image'];
?>
			<h1>Profile</h1>
			</br>
			
			<h2>Password</h2>
			<?php
				if(isset($_SESSION['error'])) {
					echo '<p class="error">' . $_SESSION['error'] . '</p>';
					unset($_SESSION['error']);
				} elseif(isset($_SESSION['success'])) {
					echo '<p class="success">' . $_SESSION['success'] . '</p>';
					unset($_SESSION['success']);
				}
				
				echo "<form action='../pages/updatepassword-processing.php' method='post' id='updatepassword'>\n\t\t\t\t";
				echo "<label>Password</label><input type='password' name='password'></input><div class='clearfix'></div>\n\t\t\t\t";
				echo "<label>Re-Enter Password</label><input type='password' name='passwordcheck'></input><div class='clearfix'></div>\n\t\t\t\t";
				echo "<input class='button' type='submit' name='submit' form='updatepassword' value='Update'><div class='clearfix'></div>\n\t\t\t";
				echo "</form>\n";
			?>
			</br>
			
			<h2>Personal Information</h2>
			<?php
				echo "<form action='../pages/updateinfo-processing.php' method='post' id='updateinfo'>\n\t\t\t\t";
				echo "<label>First Name</label><input type='text' name='firstname' value='$firstname'></input><div class='clearfix'></div>\n\t\t\t\t";
				echo "<label>Last Name</label><input type='text' name='lastname' value='$lastname'></input><div class='clearfix'></div>\n\t\t\t\t";
				echo "<label>Phone Number</label><input type='text' name='phonenumber' value='$phonenumber'></input><div class='clearfix'></div>\n\t\t\t\t";
				echo "<label>Address</label><input type='text' name='address' value='$address'></input><div class='clearfix'></div>\n\t\t\t\t";
				echo "<input class='button' type='submit' name='submit' form='updateinfo' value='Update'><div class='clearfix'></div>\n\t\t\t";
				echo "</form>\n";
			?>
			</br>
			
			<h2>Profile Image</h2>
			<?php
				echo "<img src='../images/$image' alt='Your profile picture.' class='profilepicture'>\n\t\t\t";
				echo "<form action='../pages/updateimage-processing.php' method='post' id='updateimage' enctype='multipart/form-data'>\n\t\t\t\t";
				echo "<label>Profile Image</label><input type='file' name='image'></input><div class='clearfix'></div>\n\t\t\t\t";
				echo "<input class='button' type='submit' name='submit' form='updateimage' value='Update'><div class='clearfix'></div>\n\t\t\t";
				echo "</form>\n";
			?>
<?php
	include '../includes/footer.php';
?>