<?php

	$host = "localhost";
	$user = "root";
	$password = "";
	$dbname = "kmm26";
	
	
	$conn = new mysqli($host, $user, $password, $dbname);
	
	if ($conn->connect_error) {
	    error_log("Database connection failed: " . $conn->connect_error);
	    }
	$conn->set_charset("utf8mb4");

?>