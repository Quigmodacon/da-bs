<?php
	$sql = $conn->prepare('SELECT isAdmin FROM user WHERE username = ?');
	$username = $_SESSION['username'];
	$sql->bind_param('s', $username);
	$sql->execute();
	$sql->bind_result($isAdmin);
	if($sql->fetch()) {
		if($isAdmin > 0) {
			echo '<div class="topnav">';
			echo '<a href="insert.php">Insert</a>';
			echo '<a href="delete.php">Delete</a>';
			echo '<a href="update.php">Update User</a>';
			echo '</div>';
		}
	}
?>
