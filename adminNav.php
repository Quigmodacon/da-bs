<?php
	$sql = $conn->prepare('SELECT isAdmin FROM user WHERE username = ?');
	$sql->bind_param('s', $_SESSION['username']);
	$sql->execute();
	$result = $sql->get_result();
	if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		if($row['isAdmin'] == 1) {

			echo '<div class="topnav">';
				echo '<a href="insert.php">Insert</a>';
				echo '<a href="delete.php">Delete</a>';
				echo '<a href="update.php">Update User</a>';
			echo '</div>';
		}
	}
?>
