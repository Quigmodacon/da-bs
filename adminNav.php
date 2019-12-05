<?php
	$sql = $conn->prepare('SELECT isAdmin FROM user WHERE username = ?');
	$username = $_SESSION['username'];
	$sql->bind_param('s', $username);
	$sql->execute();
	$sql->bind_result($isAdmin);
	if($sql->fetch()) {
		if($isAdmin > 0) {
            ?>
    <nav class="adminnavbar navbar navbar-expand-lg navbar-dark bg-gradient-primary">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav_page navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="insert.php">Insert</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="delete.php">Delete</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="updateUser.php">Update User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="update.php">Update Linkage</a>
              </li>
            </ul>
          </div>
    </nav>
            <?php
            }
        }
?>