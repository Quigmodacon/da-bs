<?php

function show_organism($conn) {

	//include "dbconnect.php";

	$sql = "SELECT id, name, dept_name, salary FROM organism";
	$result = $conn->query($sql); // object oriented execution of query

		if ($result->num_rows > 0) {
			
			echo "<br><h3> Instructor Table<h3> <br>";
			
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
			echo "0 results";
		}
	//$conn->close();
}

function getInstructorByID($conn, $id) {
    $sql = "SELECT * FROM instructor WHERE ID = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();

    $result = $statement->get_result();

    $instructor = $result->fetch_assoc();
    return $instructor;
}

function updateInstructorByID($conn, $id) {
    $sql = "UPDATE instructor SET salary = salary * 1.10 WHERE ID = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
}

function deleteInstructorByID($conn, $id) {
	$sql = "DELETE FROM instructor WHERE ID = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
}

?>
