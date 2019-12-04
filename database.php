<?php
// Open the database connection
// TODO: Edit this to fit the final database server

$servername = "localhost";
$username = "test";
$password = "test";
$dbname = "environment";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>
