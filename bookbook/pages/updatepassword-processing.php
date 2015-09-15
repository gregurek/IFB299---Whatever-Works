<?php
	include '../includes/connect.php';
	
	$user = $_SESSION['user'];
	$password = mysqli_real_escape_string($connect, $_POST['password']);
	$passwordcheck = mysqli_real_escape_string($connect, $_POST['passwordcheck']);
	
	if($password=='' || $passwordcheck==''){
		$_SESSION['error'] = "Your passwords do not match. Password not updated.";
		header('location:../pages/profile.php');
	}elseif($password!=$passwordcheck){
		$_SESSION['error'] = "Your passwords do not match. Password not updated.";
		header('location:../pages/profile.php');
	}else{
		$sql = "update user set password='$password' where userid='$user'";
		mysqli_query($connect, $sql) or die(mysqli_error($connect));
		$_SESSION['success'] = "Password successfully updated.";
		header('location:../pages/profile.php');
	}
?>