<?php
// Open the database connection
// TODO: Edit this to fit the final database server

$servername = "localhost";
$username = "jhanse12";
$password = "p6KE8fbo";
$dbname = "jhanse12";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>
