<!DOCTYPE>
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
                <?php include 'check_login.php'; ?>
		<main class="container" role="main">
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
		</main>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>
