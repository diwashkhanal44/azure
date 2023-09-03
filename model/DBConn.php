<?php
//connect to mysql

//$password = trim(file_get_contents("/home/ubuntu/password.txt"));
 $mysqli = new mysqli('localhost', 'root', '12Australia@21', 'customer');//ip,dbuser,dbpassword,database name
	//$mysqli = new mysqli('localhost:3306', 'root', 'fusedatabase', 'customer');//ip,dbuser,dbpassword,database name
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
?>