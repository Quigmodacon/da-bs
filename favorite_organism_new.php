<!DOCTYPE>
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
                <?php include 'check_login.php'; ?>
		<?php
			include 'database.php';
			include 'phpFunctions.php';
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$favoriteID = $_POST['favoriteID'];
				$organismID = $_POST['organismID'];
				insert_favorite_organism($conn, $favoriteID, $organismID);
				// Redirect to the favorite page
				header("Location: favorites.php");
			}
		?>
		
		<div>
			<h1 align="center">Add Favorite Organism</h1>
			<!-- rest of body -->
			<form method="post" class="main-form">
				<input type="hidden" name="favoriteID" value="<?php echo $_GET['favoriteID']; ?>">
				<div class="input-row">
					<label for="organismID">Favorite Organism</label>
					<?php show_organism_select_list($conn, 'organismID'); ?>
				</div>

				<input type="submit" value="Add">
			</form>
		</div>
	</body>
</html>
