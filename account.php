<!DOCTYPE>
<html>
	<head>
		<title>Jonathan Hansen</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">
	</head>
	<body id="hellspawn">
		<!-- header -->	
                <?php session_start(); ?>
		<?php include 'nav.php'; ?>
		<?php require 'database.php'; ?>
		<?php include 'adminNav.php'; ?>
		<?php include 'check_login.php'; ?>
		<main class="container" role="main">
			<h1 id="headertext">Account</h1>
			<!-- rest of body -->
			<div id="paraOne">
			<?php
				include 'database.php';
				$username = $_SESSION['username'];
				$stmt = $conn->prepare("SELECT userID, email FROM user WHERE username = ?");
				$stmt->bind_param("s", $username);
				$stmt->execute();
				// Bind the result
				$stmt->bind_result($userID, $email);
				if ($stmt->fetch()) {
					echo '<table>';
					echo "<tr><td class='bold darker'>Username</td><td>" . $username . "</td></tr>";
					echo "<tr><td class='bold darker'>Email</td><td>" . $email . "</td></tr>";
					echo "</table>";
				} else {
					echo '<p style="text-align: center;"><em>An error occured while fetching your account information.</em></p>';
				}
			?>
            </div>
		</main>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>
