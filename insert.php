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
			<?php include "insertAny.php" ?>
			<h1 align="center">Insert</h1>
			<!-- rest of body -->
			<div id="paraOne">
				<h3 align="center">Insert Organism</h3>
                <form method="get" class="main-form" action="">
					<div class="input-row">
						<label for="oName">Organism Name</label>
						<input id="oName" name="oName" type="text">
					</div>
					<div class="input-row">
						<label for="sName">Scientific Name</label>
						<input id="sName" name="sName" type="text">
					</div>
					<div class="input-row">
						<label for="type">Type</label>
						<select id="type" name="type" style="font-size: 20px;">
							<option value="Animal">Animal</option>
							<option value="Plant">Plant</option>
							<option value="Fungie">Fungie</option>
						</select>
					</div>
					<input type="submit" value="Insert" style="font-size: 20px;">
				</form>
				<br><br><br>
				<h3 align="center">Insert Biome</h3>
                <form method="get" class="main-form">
					<div class="input-row">
						<label for="bName">Biome Name</label>
						<input id="bName" name="bName" type="text">
					</div>
					<input type="submit" value="Insert" style="font-size: 20px;">
				</form>
				<br><br><br>
				<h3 align="center">Insert Location</h3>
                <form method="get" class="main-form">
					<div class="input-row">
						<label for="lName">Location Name</label>
						<input id="lName" name="lName" type="text">
					</div>
					<input type="submit" value="Insert" style="font-size: 20px;">
				</form>
			</div>
		</div>
	</body>
</html>
