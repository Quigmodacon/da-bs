<?php

function show_organism($conn, $extra = '') {

	//include "dbconnect.php";

    $sql = "SELECT organismID, orgName, sciName, orgType, GROUP_CONCAT(locationID) AS locationIDs, GROUP_CONCAT(locName) AS locNames FROM organism NATURAL LEFT JOIN organism_location NATURAL LEFT JOIN location ".$extra." GROUP BY organismID";
	$result = $conn->query($sql); // object oriented execution of query

			echo '<table>';
			echo '<thead class="darker center"><tr>';
			if ($_SESSION['isAdmin']) {
				echo '<th>'."ID".'</th>'.'<th>'."Name".'</th>'.'<th>'."Scientific Name".'</th>'.'<th>'."Organism Type".'</th>'.'<th>'."Locations".'</th>';
			}
			else {
				echo '<th>'."Name".'</th>'.'<th>'."Scientific Name".'</th>'.'<th>'."Organism Type".'</th>'.'<th>'."Locations".'</th>';
			}
			echo '</tr></thead>';
			echo '<tbody>';

			while($row = $result->fetch_assoc()) {
				echo '<tr>';
				if ($_SESSION['isAdmin']) {
					echo "<td class='center'>" . $row["organismID"]. "</td>";
				}
				echo '<td><a href="genericOrganism.php?orgID=' . $row["organismID"] . '">' . $row["orgName"]. "</a></td>";
				echo "<td>" . $row["sciName"]. "</td>";
				echo "<td class='center'>" . $row["orgType"]. "</td>";
                $idArray = explode(',', $row["locationIDs"]);
                $nameArray = explode(',', $row["locNames"]);
				echo "<td class='nowrap'>";
                for ($i = 0; $i < count($idArray); $i++) {
                    if ($i > 0)
                        echo '<br>';
                    echo '<a href="genericLocation.php?locID=' . $idArray[$i] . '">' . $nameArray[$i]. '</a>';
                }
                echo "</td>";
				echo '</tr>';
			}
			
			echo '</tbody>';
			echo '</table>';
	//$conn->close();
}

function show_biome($conn, $extra = '') {

	//include "dbconnect.php";

	$sql = "SELECT biomeID, bioName FROM biome ".$extra."";
	$result = $conn->query($sql); // object oriented execution of query

			echo '<table>';
			echo '<thead class="darker center"><tr>';
			if($_SESSION['isAdmin']){
				echo '<th>'."ID".'</th>'.'<th>'."Name".'</th>';
			}
			else{
				echo '<th>'."Name".'</th>';
			}
			echo '</tr></thead>';
			echo '<tbody>';

			while($row = $result->fetch_assoc()) {
				echo '<tr>';
				if($_SESSION['isAdmin']){
					echo "<td class='center'>" . $row["biomeID"]. "</td>";
				}
				echo '<td><a href="genericBiome.php?bioID=' . $row["biomeID"] . '">' . $row["bioName"]. "</a></td>";
				echo '</tr>';
			}
			
			echo '</tbody>';
			echo '</table>';
			
	//$conn->close();
}

function show_location($conn, $extra = '') {

	//include "dbconnect.php";

	$sql = "SELECT locationID, locName, GROUP_CONCAT(biomeID) AS biomeIDs, GROUP_CONCAT(bioName) AS bioNames FROM location NATURAL LEFT JOIN location_biome NATURAL LEFT JOIN biome ".$extra." GROUP BY locationID";
	$result = $conn->query($sql); // object oriented execution of query

			echo '<table>';
			echo '<thead class="darker center"><tr>';
			if($_SESSION['isAdmin']){
				echo '<th>'."ID".'</th>'.'<th>'."Name".'</th>'.'<th>'."Biome".'</th>';
			}
			else {
				echo '<th>Name</th>'.'<th>'."Name".'</th>';
			}
			echo '</tr></thead>';
			echo '<tbody>';

			while($row = $result->fetch_assoc()) {
				echo '<tr>';
				if($_SESSION['isAdmin']){
					echo "<td class='center'>" . $row["locationID"]. "</td>";
				}
				echo '<td><a href="genericLocation.php?locID=' . $row["locationID"] . '">' . $row["locName"]. "</a></td>";
                $idArray = explode(',', $row["biomeIDs"]);
                $nameArray = explode(',', $row["bioNames"]);
				echo "<td class='nowrap'>";
                for ($i = 0; $i < count($idArray); $i++) {
                    if ($i > 0)
                        echo '<br>';
                    echo '<a href="genericBiome.php?bioID=' . $idArray[$i] . '">' . $nameArray[$i]. '</a>';
                }
                echo "</td>";
				echo '</tr>';
			}
			
			echo '</tbody>';
			echo '</table>';
			
	//$conn->close();
}

function getOrganism($conn, $search) {
	if (is_numeric($search)) {
		$sql = $conn->prepare("SELECT * FROM organism WHERE organismID LIKE CONCAT('%', ?, '%')");
		$sql->bind_param('i', $search);
	}
	else {
		$sql = $conn->prepare("SELECT * FROM organism WHERE orgName LIKE CONCAT('%', ?, '%') OR sciName LIKE CONCAT('%', ?, '%') OR orgType LIKE CONCAT('%', ?, '%')");
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
			echo "<td><a" . ' href="genericOrganism.php?orgID=' . $row["organismID"] . '">' . $row["orgName"]. "</a></td>";
			echo "<td>" . $row["sciName"]. "</td>";
			echo "<td>" . $row["orgType"]. "</td>";
			echo '</tr>';
		}
			
		echo '</tbody>';
		echo '</table>';
			
		// output data of each row
			
			
	} else {
		echo '<p id="sFail">No Organisms Found<p>';
	}
	//$conn->close();
}

function getBiome($conn, $search) {
	if (is_numeric($search)) {
		$sql = $conn->prepare("SELECT * FROM biome WHERE biomeID LIKE CONCAT('%', ?, '%')");
		$sql->bind_param('i', $search);
	}
	else {
		$sql = $conn->prepare("SELECT * FROM biome WHERE bioName LIKE CONCAT('%', ?, '%')");
		$sql->bind_param('s', $search);
	}
	$sql->execute();
	$result = $sql->get_result();

	if ($result->num_rows > 0) {
		
		echo '<br><h3 align="center" style="color: black;">Biomes<h3> <br>';
		
		echo '<table border>';
		echo '<thead><tr>';
		echo '<th>'."ID".'</th>'.'<th>'."Name".'</th>';
		echo '</tr></thead>';
		echo '<tbody>';

		while($row = $result->fetch_assoc()) {
			echo '<tr>';
			echo "<td>" . $row["biomeID"]. "</td>";
			echo '<td><a href="genericBiome.php?bioID=' . $row["biomeID"] . '">' . $row["bioName"]. "</a></td>";
			echo '</tr>';
		}
			
		echo '</tbody>';
		echo '</table>';
			
		// output data of each row
			
			
	} else {
		echo '<p id="sFail">No Biomes Found</p>';
	}
	//$conn->close();
}

function getLocation($conn, $search) {
	if (is_numeric($search)) {
		$sql = $conn->prepare("SELECT * FROM location WHERE locationID LIKE CONCAT('%', ?, '%')");
		$sql->bind_param('i', $search);
	}
	else {
		$sql = $conn->prepare("SELECT * FROM location WHERE locName LIKE CONCAT('%', ?, '%')");
		$sql->bind_param('s', $search);
	}
	$sql->execute();
	$result = $sql->get_result();

	if ($result->num_rows > 0) {
		
		echo '<br><h3 align="center" style="color: black;">Locations<h3> <br>';
		
		echo '<table border>';
		echo '<thead><tr>';
		echo '<th>'."ID".'</th>'.'<th>'."Name".'</th>';
		echo '</tr></thead>';
		echo '<tbody>';

		while($row = $result->fetch_assoc()) {
			echo '<tr>';
			echo '<td>' . $row["locationID"]. "</td>";
			echo '<td><a href="genericLocation.php?locID=' . $row["locationID"] . '">' . $row["locName"]. "</a></td>";
			echo '</tr>';
		}
			
		echo '</tbody>';
		echo '</table>';
			
		// output data of each row
			
			
	} else {
		echo '<p id="sFail">No Locations Found</p>';
	}
	//$conn->close();
}

// Show a list of favorite organisms for the given favoriteID
function show_favorites($conn, $favoriteID) {
	$stmt = $conn->prepare("SELECT organismID, orgName, sciName, orgType FROM organism NATURAL JOIN favorite_organism NATURAL JOIN favorite WHERE favoriteID = ?");
	$stmt->bind_param("i", $favoriteID);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows > 0) {
		echo '<table border>';
		echo '<thead><tr>';
		echo '<th>'."ID".'</th>'.'<th>'."Name".'</th>'.'<th>'."Scientific Name".'</th>'.'<th>'."Organism Type".'</th>';
		echo '</tr></thead>';
		echo '<tbody>';

		while($row = $result->fetch_assoc()) {
			echo '<tr>';
			echo "<td>" . $row["organismID"]. "</td>";
			echo '<td><a href="genericOrganism.php?orgID=' . $row["organismID"] . '">' . $row["orgName"]. "</a></td>";
			echo "<td>" . $row["sciName"]. "</td>";
			echo "<td>" . $row["orgType"]. "</td>";
			echo '</tr>';
		}
		
		echo '</tbody>';
		echo '</table>';
		
		// output data of each row
	} 
	else {
		echo "No Favorite Organisms Found";
	}
}

function insert_favorite_organism($conn, $favoriteID, $organismID) {

	$stmt = $conn->prepare('INSERT INTO favorite_organism (favoriteID, organismID) VALUES (?, ?)');
	$stmt->bind_param("ii", $favoriteID, $organismID);
	$stmt->execute();
}

function insert_favorite_list($conn, $userID) {
	$stmt = $conn->prepare('INSERT INTO favorite (userID) VALUES (?)');
	$stmt->bind_param("i", $userID);
	$stmt->execute();
}

function get_current_userID($conn, $username) {
	$stmt = $conn->prepare('SELECT userID FROM user WHERE username = ?');
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$stmt->bind_result($userID);
	if ($stmt->fetch()) {
		return $userID;
	}
	return 0;
}

// Return a list of all favoriteIDs for the user
function get_favoriteIDs($conn, $userID) {

	$stmt = $conn->prepare("SELECT favoriteID FROM favorite WHERE userID = ?");
	$stmt->bind_param("i", $userID);
	$favoriteIDs = array();
	$stmt->execute();
	$stmt->bind_result($favoriteID);
	while ($stmt->fetch()) {
		array_push($favoriteIDs, $favoriteID);
	} 
	return $favoriteIDs;
}

// Show a select list for organisms with the given $name.
function show_organism_select_list($conn, $name) {
	$sql = "SELECT organismID, orgName, sciName, orgType FROM organism";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo '<select id="' . $name . '" name="' . $name . '">';
		while($row = $result->fetch_assoc()) {
			echo '<option value="' . $row["organismID"] . '">' . $row["orgName"] . ' -- ' . $row["orgType"] . '</option>';
		}
		echo '</select>';
	} 
}

// check if liked in a target type(organism/biome/location) with certain ID, returns the favorite ID
function isLiked($conn, $userID, $target, $targetID) {
    $sql = $conn->prepare('SELECT favoriteID FROM favorite NATURAL JOIN favorite_'.$target.' WHERE userID = ? AND '.$target.'ID = ?');
    $sql->bind_param('ii', $userID, $targetID);
    $sql->execute();
    $result = $sql->get_result();
    if ($result->num_rows > 0)
        $result = $result->fetch_assoc()['favoriteID'];
    else
        $result = 0;
    $sql->close();
	return $result;
}

// liked it
function likeIt($conn, $userID, $target, $targetID) {
    $query = '';
    $query .= 'INSERT INTO favorite(userID) VALUES ('.$userID.');';
    $query .= 'INSERT INTO favorite_'.$target.' VALUES (LAST_INSERT_ID(), '.$targetID.');';
    $sql = $conn->multi_query($query);
}

// unliked it
function unlikeIt($conn, $favID, $target) {
    $query = '';
    $query .= 'DELETE FROM favorite_'.$target.' WHERE favoriteID = '.$favID.';';
    $query .= 'DELETE FROM favorite WHERE favoriteID = '.$favID.';';
    $sql = $conn->multi_query($query);
}

?>
