<?php
	include '../includes/connect.php';
	
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);
	
	$sql = "select userid, email, password from user where email='$email' and password='$password'";
	$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
	$row = mysqli_fetch_array($result);
	$count = mysqli_num_rows($result);
	
	if($count==1){
		$_SESSION['user'] = $row['userid'];
		header('location:../pages/homepage.php');
	} else {
		$_SESSION['error'] = "Incorrect email or password.";
		header('location:../pages/login.php');
	}
?>