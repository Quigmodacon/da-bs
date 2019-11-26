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
		<div>
			<h1 align="center">Home</h1>
			<!-- rest of body -->
			<div id="paraOne">
				<p>Go ahead and look through our database, we are currently working on adding new organisms every week.</p>
			</div>
		</div>
	</body>
</html>
