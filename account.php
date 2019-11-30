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
		<?php include 'check_login.php'; ?>
		<div>
			<h1 align="center">Account</h1>
			<!-- rest of body -->
			<?php
				include 'database.php';
				$username = $_SESSION['username'];
				$stmt = $conn->prepare("SELECT userID, email FROM user WHERE username = ?");
				$stmt->bind_param("s", $username);
				$stmt->execute();
				// Bind the result
				$stmt->bind_result($userID, $email);
				if ($stmt->fetch()) {
					echo '<table class="table-border" style="margin: auto;">';
					echo "<tr><td>Username</td><td>" . $username . "</td></tr>";
					echo "<tr><td>Email</td><td>" . $email . "</td></tr>";
					echo "</table>";
				} else {
					echo '<p style="text-align: center;"><em>An error occured while fetching your account information.</em></p>';
				}
			?>
		</div>
	</body>
</html>
