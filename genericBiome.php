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
		<div>
			<?php include 'database.php';
				$bioID = $_GET['bioID'];
				$sql = $conn->prepare('SELECT * FROM biome WHERE biomeID = ?');
				$sql->bind_param('i', $bioID);
				$sql->execute();
				$sql->bind_result($biomeID, $bioName);
				$sql->fetch();
				echo '<h1 align="center" id=headertext>' . $bioName . '</h1>';
				echo '<div id="paraOne">';
				echo '<image src="images/' . $bioName . '" alt="' . $bioName . '" style="width:256px; display:block; margin-left:auto; margin-right:auto; margin-bottom:20px;">';
				echo '<div id="paraOne">';
				//echo '<table>';
				//echo '<tr><th colspan="2">' . $orgName . '</th></tr>';
				//echo '<tr><td style="padding:15px;">Scientific Name</td><td style="padding:15px;">' . $sciName . '</td></tr>';
				//echo '<tr><td style="padding:15px;">Organism Type</td><td style="padding:15px;">' . $type . '</td></tr>';
				//echo '</table>';
				echo '<h3 align="center" style="margin-top:15px; color:white;">Where are These?</h3>';
	$sql->close();
	$sql = $conn->prepare("SELECT locationID, locName FROM (SELECT location.locationID, location.locName, location_biome.biomeID FROM location INNER JOIN location_biome ON location.locationID=location_biome.locationID) AS bio WHERE biomeID = ?");
	$sql->bind_param('i', $biomeID);
	//$result = $conn->query($sql); // object oriented execution of query
		if ($sql->execute()) {
			$sql->bind_result($locationID, $locName);
			echo '<table border>';
			echo '<thead><tr>';
			if($_SESSION['isAdmin']){
				echo '<th>'."ID".'</th>'.'<th>'."Name".'</th>';
			}
			else {
				echo '<th>Name</th>';
			}
			echo '</tr></thead>';
			echo '<tbody>';

			while($sql->fetch()) {
				echo '<tr>';
				if($_SESSION['isAdmin']){
					echo "<td>" . $locationID. "</td>";
				}
				echo '<td><a href="genericLocation.php?locID=' . $locationID . '">' . $locName . "</a></td>";
				echo '</tr>';
			}
			
			echo '</tbody>';
			echo '</table>';
			
			// output data of each row
			
			
		} 
		else {
			echo "No Locations Found";
		}
	//$conn->close();
				echo '</div>';
				echo '</div>';
			?>
				
		</div>
		</main>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>
