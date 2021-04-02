<?php
//Create Connection
$servername = "localhost";
$root = "root";
$password = "";
$dbname = "cinemazing";

$conn = mysqli_connect($servername, $root, $password);

//Create Movie Database
$createdbquery = "CREATE DATABASE cinemazing";
$res = mysqli_query($conn, $createdbquery);

$newconn = mysqli_connect($servername, $root, $password, $dbname);

//Create Movie Table
$movieTable = "CREATE TABLE movies
(
	movie_id INT NOT NULL PRIMARY KEY,
	title VARCHAR(50) NOT NULL,
	director VARCHAR(30) NOT NULL,
	genre VARCHAR(30) NOT NULL,
	running_time INT(30) NOT NULL,
	release_year INT(30) NOT NULL,
	description VARCHAR(300) NOT NULL,
	show_date DATE NOT NULL,
	show_time VARCHAR(30) NOT NULL,
	price INT(30) NOT NULL,
	cover VARCHAR(1000) NOT NULL,
	trailer VARCHAR(1000) NOT NULL,
	delete_movie INT(1) NOT NULL
)";
//Create Movie Table
$res = mysqli_query($newconn, $movieTable);

//Create Table
$adminTable = "CREATE TABLE admin_account
(
	admin_id INT NOT NULL PRIMARY KEY,
	admin_username VARCHAR(30) NOT NULL,
	admin_password VARCHAR(30) NOT NULL,
	admin_profile LONGBLOB NOT NULL
)";
//Create Admin Table
$res = mysqli_query($newconn, $adminTable);

//CHECK ERROR
// if ($newconn->query($userTable) === TRUE) {
//   echo "Table MyGuests created successfully";
// } else {
//   echo "Error creating table: " . $newconn->error;
// }
?>