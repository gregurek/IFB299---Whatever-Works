<?php
	include '../includes/connect.php';
	
	$title = mysqli_real_escape_string($connect, $_POST['title']);
	$author = mysqli_real_escape_string($connect, $_POST['author']);
	$edition = mysqli_real_escape_string($connect, $_POST['edition']);
	$user = $_SESSION['user'];
	
	if($title=='' || $author==''){
		$_SESSION['error'] = "Title and author required.";
		header('location:../pages/listabook.php');
	} elseif($edition==''){
		$sql = "insert into book (title, author) values ('$title', '$author')";
		mysqli_query($connect, $sql) or die(mysqli_error($connect));
		$sql = "select bookid from book where title='$title' and author='$author' order by bookid desc";
		$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
		$row = mysqli_fetch_array($result);
		$book = $row['bookid'];
		$sql = "insert into userbook (userid, bookid) values ('$user', '$book')";
		mysqli_query($connect, $sql) or die(mysqli_error($connect));
		$_SESSION['success'] = "Book successfully added.";
		header('location:../pages/listabook.php');
	} else {
		$sql = "insert into book (title, author, edition) values ('$title', '$author', '$edition')";
		mysqli_query($connect, $sql) or die(mysqli_error($connect));
		$_SESSION['success'] = "Book successfully added.";
		header('location:../pages/listabook.php');
	}
	mysqli_close($connect);
?>