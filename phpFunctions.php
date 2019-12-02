<?php

function show_organism($conn) {

	//include "dbconnect.php";

	$sql = "SELECT organismID, orgName, sciName, orgType FROM organism";
	$result = $conn->query($sql); // object oriented execution of query

		if ($result->num_rows > 0) {
			
			echo '<table border>';
			echo '<thead><tr>';
			echo '<th>'."ID".'</th>'.'<th>'."Name".'</th>'.'<th>'."Scientific Name".'</th>'.'<th>'."Organism Type".'</th>';
			echo '</tr></thead>';
			echo '<tbody>';

			while($row = $result->fetch_assoc()) {
				echo '<tr>';
				echo "<td>" . $row["organismID"]. "</td>";
				echo "<td>" . $row["orgName"]. "</td>";
				echo "<td>" . $row["sciName"]. "</td>";
				echo "<td>" . $row["orgType"]. "</td>";
				echo '</tr>';
			}
			
			echo '</tbody>';
			echo '</table>';
			
			// output data of each row
			
			
		} 
		else {
			echo "No Organisms Found";
		}
	//$conn->close();
}

function show_biome($conn) {

	//include "dbconnect.php";

	$sql = "SELECT biomeID, bioName FROM biome";
	$result = $conn->query($sql); // object oriented execution of query

		if ($result->num_rows > 0) {
			
			echo '<table border>';
			echo '<thead><tr>';
			echo '<th>'."ID".'</th>'.'<th>'."Name".'</th>';
			echo '</tr></thead>';
			echo '<tbody>';

			while($row = $result->fetch_assoc()) {
				echo '<tr>';
				echo "<td>" . $row["biomeID"]. "</td>";
				echo "<td>" . $row["bioName"]. "</td>";
				echo '</tr>';
			}
			
			echo '</tbody>';
			echo '</table>';
			
			// output data of each row
			
			
		} 
		else {
			echo "No Biomes Found";
		}
	//$conn->close();
}

function show_location($conn) {

	//include "dbconnect.php";

	$sql = "SELECT locationID, locName FROM location";
	$result = $conn->query($sql); // object oriented execution of query

		if ($result->num_rows > 0) {
			
			echo '<table border>';
			echo '<thead><tr>';
			echo '<th>'."ID".'</th>'.'<th>'."Name".'</th>';
			echo '</tr></thead>';
			echo '<tbody>';

			while($row = $result->fetch_assoc()) {
				echo '<tr>';
				echo "<td>" . $row["locationID"]. "</td>";
				echo "<td>" . $row["locName"]. "</td>";
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
}

function getOrganism($conn, $search) {
	if (is_numeric($search)) {
		$sql = $conn->prepare('SELECT * FROM organism WHERE organismID = ?');
		$sql->bind_param('i', $search);
	}
	else {
		$sql = $conn->prepare('SELECT * FROM organism WHERE orgName = ? OR sciName = ? OR orgType = ?');
		$sql->bind_param('sss', $search, $search, $search);
	}
	$sql->execute();
	$result = $sql->get_result();

	if ($result->num_rows > 0) {
		
		echo '<br><h3 align="center" style="color: black;">Organisms<h3> <br>';
		
		echo '<table border>';
		echo '<thead><tr>';
		echo '<th>'."ID".'</th>'.'<th>'."Name".'</th>'.'<th>'."Scientific Name".'</th>'.'<th>'."Organism Type".'</th>';
		echo '</tr></thead>';
		echo '<tbody>';

		while($row = $result->fetch_assoc()) {
			echo '<tr>';
			echo "<td>" . $row["organismID"]. "</td>";
			echo "<td>" . $row["orgName"]. "</td>";
			echo "<td>" . $row["sciName"]. "</td>";
			echo "<td>" . $row["orgType"]. "</td>";
			echo '</tr>';
		}
			
		echo '</tbody>';
		echo '</table>';
			
		// output data of each row
			
			
	} else {
		echo "No Organisms Found";
	}
	//$conn->close();
}

?>
