<?php
	include '../includes/header.php';
?>
			<h1 class="center">Book Book Search</h1>
			<form action="../pages/searchresults.php" method="get" id="search" class="search">
				<input type="text" name="search" placeholder="Python for Rookies...">
				<input class="button" type="submit" name="submit" form="search" value="Search"><div class="clearfix"></div>
			</form>
<?php
	include '../includes/footer.php';
?>