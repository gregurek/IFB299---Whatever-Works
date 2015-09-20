<?php
	session_start();
	$connect = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net", "b103bd049d2760", "b103a1a1", "bookbookmysql");
	if (mysqli_connect_errno($connect))
	{
		echo "Unable to connect to the server: " . mysqli_connect_error();
		exit();
	}
?>