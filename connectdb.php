<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "estoquev1";

	// Create connection
	$link = mysqli_connect($servername, $username, $password,$db);

	// Check connection
	if ($link->connect_error) {
	  die("Connection failed: " . $link->connect_error);
	}

?>