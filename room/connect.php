<?php

	$db_user="root";
	$db_password= "";
	$db_host= "localhost";
	$db_database= "calendar";
	$link=mysql_connect($db_host, $db_user, $db_password) or die ("Connection Failure");
	
	mysql_select_db($db_database, $link);



	$localhost = "localhost";
	$user = "root";
	$password = "";
	$database = "calendar";

	$connect = mysqli_connect($localhost, $user, $password, $database);

	if(!$connect){
		echo "There was an error in connecting database";
	}
	
	?>