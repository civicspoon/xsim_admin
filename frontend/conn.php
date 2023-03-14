<?php
session_start();
ob_start();
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "aot#avsec";
	$dbName = "xsim2";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);	
	if ($conn -> connect_errno) {
 	 echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
 	 exit();
	}
	$conn -> set_charset("utf8");

	
	//$query = mysqli_query($conn,$sql);

	?>