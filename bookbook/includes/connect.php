<?php
	session_start();
	$connect = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net", "b1b2d643526028", "2cf3c78f", "bookbook");
	if (mysqli_connect_errno($connect))
	{
		echo "Unable to connect to the server: " . mysqli_connect_error();
		exit();
	}
?>