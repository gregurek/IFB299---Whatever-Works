<?php
	include '../includes/connect.php';
	
	$bookid = mysqli_real_escape_string($connect, $_GET['book']);;
	
	$_SESSION['bookid'] = $bookid;
	
	header('location: ../pages/updatebook.php');
?>