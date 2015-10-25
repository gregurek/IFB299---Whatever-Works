<?php
	include '../includes/connect.php';
	
	$user = $_SESSION['user'];
	$image = $_FILES['image']['name'];
	$timestamp = date_create();
	$newimagename = date_timestamp_get($timestamp) . '_' . $image;
	$target = '../images/' . $newimagename;
	$allowedexts = array('jpg', 'jpeg', 'gif', 'png');
	$tmp = explode('.', $_FILES['image']['name']);
	$extension = end($tmp);
	
	if($_FILES['image']['size'] > 512000){
		$_SESSION['error'] = "Your image exceeds the 500kB limit.";
		header('location:../pages/profile.php');
		exit();
	}elseif(($_FILES['image']['type'] == 'image/jpg') || ($_FILES['image']['type'] == 'image/jpeg') || ($_FILES['image']['type'] == 'image/png') || ($_FILES['image']['type'] == 'image/gif') && in_array($extension, $allowedExts)){
		move_uploaded_file($_FILES['image']['tmp_name'], $target);
		$sql = "update user set image='$newimagename' where userid='$user'";
		mysqli_query($connect, $sql) or die(mysqli_error($connect));
		$_SESSION['success'] = "Profile image successfully updated.";
		header('location:../pages/profile.php');
		exit();
	}else{
		$_SESSION['error'] = "Only JPG, PNG and GIF files are allowed.";
		header('location:../pages/profile.php');
		exit();
	}
?>