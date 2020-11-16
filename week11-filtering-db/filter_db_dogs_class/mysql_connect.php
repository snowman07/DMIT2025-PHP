<?php

	// Connect to DB: Since all files depend on this, this will be included in our header, which is then included in all files.
	$con = mysqli_connect("localhost", "adomingo4","PDsbNesMr3sSS79","adomingo4_dmit2025");

	// Check connection
	if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	// this stops SQL injections in all $_POST data transfer

	foreach($_POST as $key =>$value){
		$_POST[$key] = trim(mysqli_real_escape_string($con,$value));
		
	}
	// this stops SQL injections in all $_GET data transfer
	foreach($_GET as $key =>$value){
		$_GET[$key] = trim(mysqli_real_escape_string($con,$value));
		
	}
?>