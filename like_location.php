<?php
	session_start();
	require 'phpFunctions.php';
	require 'database.php';
	include 'check_login.php';
    
    // arguments
	$userID = get_current_userID($conn, $_SESSION['username']);
    $target = 'location';
    $targetID = $_POST['locID'];
    // switching favorite
    $favID = isLiked($conn, $userID, $target, $targetID);
    if ($favID)
        unlikeIt($conn, $favID, $target);
    else
        likeIt($conn, $userID, $target, $targetID);
    // return to generic page
    header('Location: genericLocation.php?locID='.$targetID);
?>
