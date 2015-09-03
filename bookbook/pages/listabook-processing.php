<?php
	include '../includes/connect.php';
	
	$title = mysqli_real_escape_string($connect, $_POST['title']);
	$author = mysqli_real_escape_string($connect, $_POST['author']);
	$edition = mysqli_real_escape_string($connect, $_POST['edition']);
	
	if($title=='' || $author==''){
		$_SESSION['error'] = "Title and author required.";
		header('location:../pages/listabook.php');
	} elseif($edition==''){
		$sql = "insert into book (title, author) values ('$title', '$author')";
		$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
		$_SESSION['success'] = "Book successfully added.";
		header('location:../pages/listabook.php');
	} else {
		$sql = "insert into book (title, author, edition) values ('$title', '$author', '$edition')";
		$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
		$_SESSION['success'] = "Book successfully added.";
		header('location:../pages/listabook.php');
	}
	mysqli_close($connect);
?>