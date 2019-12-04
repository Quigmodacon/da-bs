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
		<?php include 'check_login.php'; ?>
<?php if($_SESSION['isAdmin']) : ?>
		<?php include 'adminNav.php'; ?>
		<div>
			<?php
				include 'database.php';
				if ( isset($_GET['oName']) && isset($_GET['sName']) && isset($_GET['type'])) {
					$oName = $_GET['oName'];
					$sName = $_GET['sName'];
					$type = $_GET['type'];
					$sql = $conn->prepare("INSERT INTO organism (orgName, sciName, orgType) VALUES (?, ?, ?)");	
					$sql->bind_param('sss', $oName, $sName, $type);
					$sql->execute();
				}	 
				else if (isset($_GET['bName'])) {
					$bName = $_GET['bName'];
					$sql = $conn->prepare("INSERT INTO biome (bioName) VALUES (?)");
					$sql->bind_param('s', $bName);
					$sql->execute();
				}
	 			else if (isset($_GET['lName'])) {
					$lName = $_GET['lName'];
					$sql = $conn->prepare("INSERT INTO location (locName) VALUES (?)");
					$sql->bind_param('s', $lName);
					$sql->execute();

				} 
				else {
					echo '<p align="center">Not enough information</p>';
				}
			?>
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
<?php endif ?>
	</body>
</html>