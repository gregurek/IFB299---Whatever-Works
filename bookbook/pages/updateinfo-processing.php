<?php
	include '../includes/connect.php';
	
	$user = $_SESSION['user'];
	$firstname = mysqli_real_escape_string($connect, $_POST['firstname']);;
	$lastname = mysqli_real_escape_string($connect, $_POST['lastname']);;
	$phonenumber = mysqli_real_escape_string($connect, $_POST['phonenumber']);;
	$address = mysqli_real_escape_string($connect, $_POST['address']);;
	
	if($firstname=='' || $lastname=='' || $phonenumber=='' || $address==''){
		$_SESSION['error'] = "All fields are required.";
		header('location:../pages/profile.php');
	}else{
		$sql = "update user set firstname='$firstname', lastname='$lastname', phonenumber='$phonenumber', address='$address' where userid='$user'";
		mysqli_query($connect, $sql) or die(mysqli_error($connect));
		$_SESSION['success'] = "Personal Information successfully updated.";
		header('location:../pages/profile.php');
	}
?>