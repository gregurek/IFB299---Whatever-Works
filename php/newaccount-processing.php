<?php
	include '../includes/connect.php';
	
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);
	$passwordcheck = mysqli_real_escape_string($connect, $_POST['passwordcheck']);
	$firstname = mysqli_real_escape_string($connect, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($connect, $_POST['lastname']);
	$phonenumber = mysqli_real_escape_string($connect, $_POST['phonenumber']);
	$address = mysqli_real_escape_string($connect, $_POST['address']);
	
	$image = $_FILES['image']['name'];
	$timestamp = date_create();
	$newimagename = date_timestamp_get($timestamp) . '_' . $image;
	$target = '../images/' . $newimagename;
	$allowedexts = array('jpg', 'jpeg', 'gif', 'png');
	$tmp = explode('.', $_FILES['image']['name']);
	$extension = end($tmp);
	
	if($email=='' || $password=='' || $passwordcheck==''){
		$_SESSION['error'] = "All fields required.";
		header('location:../pages/newaccount.php');
	} elseif($password==$passwordcheck){
		if($_FILES['image']['size'] > 512000){
			$_SESSION['error'] = "Your image exceeds the maximum of 500kb.";
			header('location:../pages/newaccount.php');
			exit();
		} elseif(($_FILES['image']['type'] == 'image/jpg') || ($_FILES['image']['type'] == 'image/jpeg') || ($_FILES['image']['type'] == 'image/png') || ($_FILES['image']['type'] == 'image/gif') && in_array($extension, $allowedExts)){
			move_uploaded_file($_FILES['image']['tmp_name'], $target);
			
			$sql = "insert into user (email, password, firstname, lastname, phonenumber, address, image) values ('$email', '$password', '$firstname', '$lastname', '$phonenumber', '$address', '$newimagename')";
			$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
			$_SESSION['success'] = "Account successfully created.";
			header('location:../pages/newaccount.php');
		}else{
			$_SESSION['error'] = "Only JPG, PNG, and GIF files are allowed.";
			header('location:../pages/newaccount.php');
			exit();
		}
	} else {
		$_SESSION['error'] = "Passwords do not match.";
		header('location:../pages/newaccount.php');
	}
	mysqli_close($connect);
?>