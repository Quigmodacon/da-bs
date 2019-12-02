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
			<h1 align="center">Biomes</h1>
			<!-- rest of body -->
			<div id="paraOne">
				<?php show_biome($conn) ?>
			</div>
		</div>
	</body>
</html>
