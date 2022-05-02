<?php

// Database Information
    $hostname='localhost'; // Your Host
	$user = 'root'; // Your Database's Username
	$password = ''; // Your Database's Password
	$mysql_database = 'database'; // Replace database with your database name
	$db = mysql_connect($hostname, $user, $password,$mysql_database);
	mysql_select_db("database", $db); // Replace database with your database name
	
// Firebase Information
    define('FIREBASE_API_KEY', 'Your Firebase Server Key Here');
