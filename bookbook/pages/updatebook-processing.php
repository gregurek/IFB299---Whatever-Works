<?php
	include '../includes/connect.php';
	
	$book = $_SESSION['bookid'];
	$title = mysqli_real_escape_string($connect, $_POST['title']);
	$author = mysqli_real_escape_string($connect, $_POST['author']);
	$edition = mysqli_real_escape_string($connect, $_POST['edition']);
	$condition = mysqli_real_escape_string($connect, $_POST['bookcondition']);
	
	if($title =='' || $author==''){
		$_SESSION['error'] = "Title and Author are required.";
		header('location:../pages/updatebook.php');
	}else{
		$sql = "update book set title='$title', author='$author', edition='$edition', bookcondition='$condition' where bookid='$book'";
		mysqli_query($connect, $sql) or die(mysqli_error($connect));
		$_SESSION['success'] = "Personal Information successfully updated.";
		header('location:../pages/mybooks.php');
	}
?>