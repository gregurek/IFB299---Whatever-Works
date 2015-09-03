<?php
	include '../includes/connect.php';
	
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);
	$passwordcheck = mysqli_real_escape_string($connect, $_POST['passwordcheck']);
	
	if($email=='' || $password=='' || $passwordcheck==''){
		$_SESSION['error'] = "All fields required.";
		header('location:../pages/newaccount.php');
	} elseif($password==$passwordcheck){
		$sql = "insert into user (email, password) values ('$email', '$password')";
		$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
		$_SESSION['success'] = "Account successfully created.";
		header('location:../pages/newaccount.php');
	} else {
		$_SESSION['error'] = "Passwords do not match.";
		header('location:../pages/newaccount.php');
	}
	mysqli_close($connect);
?>