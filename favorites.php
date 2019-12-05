<!DOCTYPE html>
<html>
	<head>
		<title>Jonathan Hansen</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
		<main class="container" role="main">
		<div>
			<h1 id="headertext" align="center">Favorites</h1>
			<!-- rest of body -->
			<?php
				$userID = get_current_userID($conn, $_SESSION['username']);
				$favoriteIDs = get_favoriteIDs($conn, $userID);
				foreach ($favoriteIDs as $favoriteID) {
					echo '<div id="paraOne">';
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
		</main>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>
