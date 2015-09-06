<?php
	include '../includes/connect.php';
?>

<html>

<head>
<style>
a:hover {
    background-color: #6699FF;
}
</style>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="../css/main.css" />
<link rel="icon" type="image/ico" href="../images/favicon.ico">
<link rel="shortcut icon" href="../images/shortcuticon.ico">

<title>Book Book - The community based text-book sharing application.</title>


</head>

<body>
	
<div class='wrapper'>

<header>
	<h1><img src="https://www.qut.edu.au/qut-logo-og-200.jpg" / style="width:52px;height:52px;" align="right">Book Book</h1>
	<p>The community based text-book sharing application.</p>
	

</header>

<nav>
	<ul>

		<li><a href='../pages/homepage.php'>Homepage</a></li>
		<li><a href='../pages/searchresults.php'>Search Results</a></li>
		
		
		<ul style='text-align: right;'>
		<?php
			if(isset($_SESSION['email'])){
				echo "<li><a href='../pages/listabook.php'>List A Book</a></li>";
				echo "<li><a href='../pages/logout.php'>Logout</a></li>";
			} else {
				echo "<li><a href='../pages/newaccount.php'>Create Account</a></li>";
				echo "<li><a href='../pages/login.php'>Login</a></li>";
			}
		?>
		</ul>
	</ul>
</nav>