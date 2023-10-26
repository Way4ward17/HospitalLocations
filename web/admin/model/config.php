<?php
	//Set DB variables
	$host		=	'localhost:3306';
	$user		=	'roots';
	$password	=	'';
	$db_name	=	'emergency_care';

	//Start Connection
	$mysqli = new mysqli($host, $user, $password, $db_name);
	//Check for Connection Error
	if ($mysqli->connect_error) {
		die("Connection to server was not established <br>".$mysqli->connect_error);
	}

