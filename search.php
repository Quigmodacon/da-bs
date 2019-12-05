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
        <?php
            $search = $_GET['search'];
        ?>
		<main class="container" role="main">
		<div>
			<h1 id="headertext" align="center">Search Results for '<?php echo $search; ?>'</h1>
			<!-- rest of body -->
			<div id="paraOne">
			<h3>Organism</h3>
			<?php
				$userID = get_current_userID($conn, $_SESSION['username']);
                show_organism($conn, "WHERE organismID LIKE CONCAT('%', '".$search."', '%') OR orgName LIKE CONCAT('%', '".$search."', '%') OR sciName LIKE CONCAT('%', '".$search."', '%') OR orgType LIKE CONCAT('%', '".$search."', '%')");
			?>
			<h3>Biome</h3>
			<?php
				$userID = get_current_userID($conn, $_SESSION['username']);
                show_biome($conn, "WHERE biomeID LIKE CONCAT('%', '".$search."', '%') OR bioName LIKE CONCAT('%', '".$search."', '%')");
			?>
			<h3>Location</h3>
			<?php
				$userID = get_current_userID($conn, $_SESSION['username']);
                show_location($conn, "WHERE locationID LIKE CONCAT('%', '".$search."', '%') OR locName LIKE CONCAT('%', '".$search."', '%')");
			?>
		</div>
		</main>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>
