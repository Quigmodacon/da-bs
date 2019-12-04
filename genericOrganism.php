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
			<?php include 'database.php';
				$orgID = $_GET['orgID'];
				$sql = $conn->prepare('SELECT * FROM organism WHERE organismID = ?');
				$sql->bind_param('i', $orgID);
				$sql->execute();
				$sql->bind_result($organismID, $orgName, $sciName, $type);
				$sql->fetch();
				
				echo '<h1 align="center" id=headertext>' . $orgName . '</h1>';
				echo '<div id="paraOne">';
				echo '<img src="images/' . $sciName . '.jpg" alt="' . $orgName . '" style = "width:256px; margin-left: auto; margin-right: auto; margin-bottom:20px; border-style: solid; border-color:#ffffff;">';
				echo '<table>';
				echo '<tr><th class="center darker" colspan="2">' . $orgName . '</th></tr>';
				echo '<tr><td class="center dark">Scientific Name</td><td>' . $sciName . '</td></tr>';
				echo '<tr><td class="center dark">Organism Type</td><td class="center">' . $type . '</td></tr>';
				echo '</table>';
				echo '<br> <h3 align="center">Where To Find?</h3>';
	$sql->close();
	$sql = $conn->prepare("SELECT locationID, locName FROM (SELECT location.locationID, location.locName, organism_location.organismID FROM location INNER JOIN organism_location ON location.locationID=organism_location.locationID) AS loc WHERE organismID = ?");
	$sql->bind_param('i', $organismID);
	//$result = $conn->query($sql); // object oriented execution of query
		if ($sql->execute()) {
			$sql->bind_result($locationID, $locName);
			echo '<table>';
			echo '<thead><tr>';
			if($_SESSION['isAdmin']){
				echo '<th class="center darker">'."ID".'</th>'.'<th class="center darker">'."Name".'</th>';
			}
			else {
				echo '<th class="center darker">Name</th>';
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
			?>
		</main>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>
