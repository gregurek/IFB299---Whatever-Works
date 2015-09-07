<?php
	include '../includes/connect.php';
?>

<html>

<head>

<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="../css/main.css" />
<link rel="icon" type="image/ico" href="../images/favicon.ico">
<link rel="shortcut icon" href="../images/shortcuticon.ico">

<title>Book Book - The community based text-book sharing application.</title>

</head>

<body>
	
<div class='wrapper'>

<header>
	<h1><img src="https://www.qut.edu.au/qut-logo-og-200.jpg" / style="width:52px;height:52px;" align="right">Book Book</h1> <!-- This line needs revision. -->
	<p>The community based text-book sharing application.</p>
</header>

<nav>
	<ul>
		<li><a href='../pages/homepage.php'>Homepage</a></li>
		<li><a href='../pages/searchresults.php'>Search Results</a></li>
		
		<?php
			if(isset($_SESSION['email'])){
				echo "<li class='clearfix'><a href='../pages/listabook.php'>List A Book</a></li>";
			}
		?>
	</ul>
	<?php
			if(isset($_SESSION['email'])){
				echo "<ul class='rightnav'>";
				echo "<li><a href='../pages/logout.php'>Logout</a></li>";
				echo "</ul>";
			} else {
				echo "<ul class='rightnav'>";
				echo "<li class='clearfix'><a href='../pages/newaccount.php'>Create Account</a></li>";
				echo "<li><a href='../pages/login.php'>Login</a></li>";
				echo "</ul>";
			}
		?>
</nav>