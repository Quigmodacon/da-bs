<!DOCTYPE>
<html>
	<head>
		<title>Jonathan Hansen</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body id="hellspawn">
		<!-- header -->	
                <?php session_start(); ?>
		<?php include 'nav.php'; ?>
		<?php require 'database.php'; ?>
		<?php include 'adminNav.php'; ?>
		<?php include 'check_login.php'; ?>
		<div>
			<h1 align="center">Delete</h1>
			<!-- rest of body -->
			<div id="paraOne">
				<p>Add 3 delete forms here (place functions in phpfunctions.php)</p>
			</div>
		</div>
	</body>
</html>
