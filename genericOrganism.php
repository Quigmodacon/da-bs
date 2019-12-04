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
                <?php include 'check_login.php'; ?>
		<div>
			<?php include 'database.php';
				$orgID = $_GET['orgID'];
				$sql = $conn->prepare('SELECT * FROM organism WHERE organismID = ?');
				$sql->bind_param('i', $orgID);
				$sql->execute();
				$sql->bind_result($organismID, $orgName, $sciName, $type);
				$sql->fetch();
				
				echo '<h1 align="center">' . $orgName . '</h1>';
				echo '<div id="paraOne">';
				echo '<image src="images/' . $sciName . '" alt="' . $orgName . '" style="width:256px; display:block; margin-left:auto; margin-right:auto; margin-bottom:20px;">';
				echo '<div id="paraOne">';
				echo '<table>';
				echo '<tr><th colspan="2">' . $orgName . '</th></tr>';
				echo '<tr><td style="padding:15px;">Scientific Name</td><td style="padding:15px;">' . $sciName . '</td></tr>';
				echo '<tr><td style="padding:15px;">Organism Type</td><td style="padding:15px;">' . $type . '</td></tr>';
				echo '</table>';
				echo '<h3 align="center" style="margin-top:15px;">Where To Find?</h3>';
	$sql->close();
	$sql = $conn->prepare("SELECT locationID, locName FROM (SELECT location.locationID, location.locName, organism_location.organismID FROM location INNER JOIN organism_location ON location.locationID=organism_location.locationID) AS loc WHERE organismID = ?");
	$sql->bind_param('i', $organismID);
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
				echo '<td><a href="genericLocation.php?orgID=' . $locationID . '">' . $locName . "</a></td>";
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
	</body>
</html>
