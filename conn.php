<?php
	$conn = mysqli_connect("localhost","root",null,"om_db");
	if(!$conn)
	die("Database connection error:".mysqli_connect_error());
	
?>