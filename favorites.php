<!DOCTYPE html>
<html>
	<head>
		<title>Jonathan Hansen</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body id="hellspawn">
		<?php session_start(); ?>
		<?php $loggedIn = $_SESSION['logInBool'] ?>
		<!-- header -->	
		<?php include 'nav.php';?>
		<?php require 'phpFunctions.php'?>
		<?php require 'database.php' ?>
	        <?php include 'check_login.php'; ?>
		<div>
			<h1 align="center">Favorites</h1>
			<!-- rest of body -->
			<?php
				$userID = get_current_userID($conn, $_SESSION['username']);
				$favoriteIDs = get_favoriteIDs($conn, $userID);
				foreach ($favoriteIDs as $favoriteID) {
					echo '<div class="favorite">';
					show_favorites($conn, $favoriteID);
					echo '<p><a href="favorite_organism_new.php?favoriteID=' . $favoriteID . '">New favorite Organism</a></p>';
					echo '</div>';
				}

				if (count($favoriteIDs) == 0) {
					echo 'No favorite lists found';
				}
			?>

			<form action="favorite_new.php" method="post" style="text-align: center;">
				<input type="submit" value="Add New Favorite List">
			</form>
		</div>
	</body>
</html>
