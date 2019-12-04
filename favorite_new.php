<?php
	session_start();
	// Inserts a new favorite list and then redirects back to the main favorites page
	require 'phpFunctions.php';
	require 'database.php';
	include 'check_login.php';

	$userID = get_current_userID($conn, $_SESSION['username']);
	insert_favorite_list($conn, $userID);
	header("Location: favorites.php");
?>
