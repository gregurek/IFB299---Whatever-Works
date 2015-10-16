<?php
	include '../includes/connect.php';
	
	$bookid = mysqli_real_escape_string($connect, $_GET['book']);;
	
	$sql="delete from book where bookid=" . $bookid;
	$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
	
	$_SESSION['success'] = "Book successfully removed.";
	header('location: ../pages/mybooks.php');
?>