<?php
	include '../includes/connect.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Page Information -->
		<meta charset="UTF-8">
		<meta name="description" content="Student Text Book Sharing at QUT">
		<meta name="keywords" content="Student, Text Book, Sharing, QUT">
		<meta name="author" content="Group 32">
		
		<!-- Stylesheet -->
		<link rel="stylesheet" type="text/css" href="../css/main.css" />
		
		<!-- Icons -->
		<link rel="icon" type="image/ico" href="../images/favicon.ico">
		<link rel="shortcut icon" href="../images/shortcuticon.ico">
		
		<title>Book Book - The community based text-book sharing application.</title>
	</head>

	<body>	
		<div class='wrapper'>
			<!-- Heading Banner -->
			<header>
				<h1><img src="https://www.qut.edu.au/qut-logo-og-200.jpg" / style="width:52px;height:52px;" align="right">Book Book</h1>
				<p>The community based text-book sharing application.</p>
			</header>
			
			<!-- Navigation Strip -->
			<nav>
				<ul>
					<li><a href='../pages/homepage.php'>Homepage</a></li>
					<li><a href='../pages/searchresults.php'>Search Results</a></li>
					<?php
						if(isset($_SESSION['user'])){
							echo "<li class='clearfix'><a href='../pages/listabook.php'>List A Book</a></li>";
						}
					?>
				
				</ul>
				
				<?php
					if(isset($_SESSION['user'])){
						echo "<ul class='rightnav'>\n\t\t\t\t\t";
						echo "<li><a href='../pages/profile.php'>Profile</a></li>\n\t\t\t\t\t";
						echo "<li><a href='../pages/logout.php'>Logout</a></li>\n\t\t\t\t";
						echo "</ul>";
					} else {
						echo "<ul class='rightnav'>";
						echo "<li class='clearfix'><a href='../pages/newaccount.php'>Create Account</a></li>";
						echo "<li><a href='../pages/login.php'>Login</a></li>";
						echo "</ul>";
					}
				?>
				
			</nav>
			
			<!-- Content -->
