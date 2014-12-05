<?php
	//php script tha establishes the connection between the
	//web site and the database. Sets the username, password,
	//host and database name.
	$dbhost = 'localhost';
	$user = 'root';
	$password = '';
	$db = '3071_3221_3223_3301';
	
	//Starts a connection, if there is no connection then the script dies.
	$connect = mysql_connect($dbhost, $user, $password) or die("Unable to connect!");
	mysql_select_db($db);
?>