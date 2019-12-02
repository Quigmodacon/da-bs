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
		<?php require 'phpFunctions.php'?>
		<?php require 'database.php' ?>
        <?php include 'check_login.php'; ?>
		<div>
			<h1 align="center">Search Results</h1>
			<!-- rest of body -->
			<div id="paraOne">
				<?php
					if(! get_magic_quotes_gpc() ) { // if magic qoutes is not set, then add escapes manually and get Posted parameters in local variables
        				$search_id = addslashes ($_POST['search_id']);
    				} else {
        				$search_id = $_POST['search_id'];
    				}
					getOrganism($conn, $search_id) 
				?>
			</div>
		</div>
	</body>
</html>
