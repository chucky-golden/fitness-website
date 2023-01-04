<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "newweb";

	//create connection
	$connect = mysqli_connect($servername, $username, $password, $dbName);

	//check connection
	if ($connect) {
		//echo "server connected";
	}else{
		//echo "server not connected";
	}



	
