<?php
	include '../includes/connect.php';
	
	$title = mysqli_real_escape_string($connect, $_POST['title']);
	$author = mysqli_real_escape_string($connect, $_POST['author']);
	$edition = mysqli_real_escape_string($connect, $_POST['edition']);
	$condition = mysqli_real_escape_string($connect, $_POST['bookcondition']);
	$user = $_SESSION['user'];
	
	$image = $_FILES['image']['name'];
	$timestamp = date_create();
	$newimagename = date_timestamp_get($timestamp) . '_' . $image;
	$target = '../images/books/' . $newimagename;
	$allowedexts = array('jpg', 'jpeg', 'gif', 'png');
	$tmp = explode('.', $_FILES['image']['name']);
	$extension = end($tmp);
	
	if($title=='' || $author==''){
		$_SESSION['error'] = "Title and author required.";
		header('location:../pages/listabook.php');
	} else {
		if($edition=='' && $image==''){
			$sql = "insert into book (title, author, bookcondition) values ('$title', '$author', '$condition')";
		}elseif($edition=='' && $image!=''){
			$sql = "insert into book (title, author, bookcondition, image) values ('$title', '$author', '$condition', '$newimagename')";
		}elseif($edition!='' && $image==''){
			$sql = "insert into book (title, author, bookcondition, edition) values ('$title', '$author', '$condition', '$edition')";
		}else{
			$sql = "insert into book (title, author, bookcondition, edition, image) values ('$title', '$author', '$condition', '$edition', '$newimagename')";
		}
		if($image==''){
			mysqli_query($connect, $sql) or die(mysqli_error($connect));
			$book = mysqli_insert_id($connect);
			$sql = "insert into userbook (userid, bookid) values ('$user', '$book')";
			mysqli_query($connect, $sql) or die(mysqli_error($connect));
			$_SESSION['success'] = "Book successfully added.";
			header('location:../pages/listabook.php');
		}else{
			if($_FILES['image']['size'] > 512000){
				$_SESSION['error'] = "Your image exceeds the 500kB limit.";
				header('location:../pages/listabook.php');
				exit();
			}elseif(($_FILES['image']['type'] == 'image/jpg') || ($_FILES['image']['type'] == 'image/jpeg') || ($_FILES['image']['type'] == 'image/png') || ($_FILES['image']['type'] == 'image/gif') && in_array($extension, $allowedExts)){
				move_uploaded_file($_FILES['image']['tmp_name'], $target);
				mysqli_query($connect, $sql) or die(mysqli_error($connect));
				$book = mysqli_insert_id($connect);
				$sql = "insert into userbook (userid, bookid) values ('$user', '$book')";
				mysqli_query($connect, $sql) or die(mysqli_error($connect));
				$_SESSION['success'] = "Book successfully added.";
				header('location:../pages/listabook.php');
				exit();
			}else{
				$_SESSION['error'] = "Only JPG, PNG and GIF files are allowed.";
				//header('location:../pages/listabook.php');
				exit();
			}
		}
	}
	mysqli_close($connect);
?>