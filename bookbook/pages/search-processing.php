<?php
	header('location: ../pages/searchresults.php');
	
	$sql = "select title, author, edition, email from book join userbook on book.bookid = userbook.bookid join user on userbook.userid = user.userid where title like '$search'";
?>