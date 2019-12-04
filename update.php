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
				if ( isset($_GET['oName']) && isset($_GET['sName']) && isset($_GET['lName'])) {
					$oName = $_GET['oName'];
					$sName = $_GET['sName'];
					$lName = $_GET['lName'];
					$sql = $conn->prepare("SELECT organismID FROM organism WHERE orgName = ? AND sciName = ?");	
					$sql->bind_param('ss', $oName, $sName);
					$sql->execute();
					$sql->bind_result($organismID);
					$sql->fetch();
					$orgID = $organismID;
					$sql->close();
					$sql = $conn->prepare("SELECT locationID FROM location WHERE locName = ?");	
					$sql->bind_param('s', $lName);
					$sql->execute();
					$sql->bind_result($locationID);
					$sql->fetch();
					$locID = $locationID;
					$sql->close();
					$sql = $conn->prepare("INSERT INTO organism_location (organismID, locationID) VALUES (?, ?)");
					$sql->bind_param('ii', $orgID, $locID);
					$sql->execute();
					$sql->close();
				}	 
				else if (isset($_GET['bName']) && isset($_GET['lName'])) {
					$bName = $_GET['bName'];
					$lName = $_GET['lName'];
					$sql = $conn->prepare("SELECT biomeID FROM biome WHERE bioName = ?");
					$sql->bind_param('s', $bName);
					$sql->execute();
					$sql->bind_result($biomeID);
					$sql->fetch();
					$sql->close();
					$sql = $conn->prepare("SELECT locationID FROM location WHERE locName = ?");	
					$sql->bind_param('s', $lName);
					$sql->execute();
					$sql->bind_result($locationID);
					$sql->fetch();
					$sql->close();
					$sql = $conn->prepare("INSERT INTO location_biome (locationID, biomeID) VALUES (?, ?)");
					$sql->bind_param('ii', $locationID, $biomeID);
					$sql->execute();
					$sql->close();
				}
				else {
					echo '<p align="center">Not enough information</p>';
				}
			?>
			<h1 align="center">Update Linkage</h1>
			<!-- rest of body -->
			<div id="paraOne">
				<h3 align="center">Link Organism and Location</h3>
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
						<label for="lName">Location</label>
						<input id="lName" name="lName" type="text">
					</div>
					<input type="submit" value="Update" style="font-size: 20px;">
				</form>
				<br><br><br>
				<h3 align="center">Link Biome and Location</h3>
                <form method="get" class="main-form">
					<div class="input-row">
						<label for="bName">Biome Name</label>
						<input id="bName" name="bName" type="text">
					</div>
					<div class="input-row">
						<label for="lName">Location Name</label>
						<input id="lName" name="lName" type="text">
					</div>
					<input type="submit" value="Update" style="font-size: 20px;">
				</form>
			</div>
		</div>
<?php endif ?>
	</body>
</html>
