<!DOCTYPE>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body id="hellspawn">
		<?php session_start(); ?>
		<?php $loggedIn = $_SESSION['logInBool'] ?? false ?>
		<!-- header -->	
		<?php include 'nav.php';?>		

		<?php
			include 'database.php';
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// Insert the record
				$stmt = $conn->prepare("INSERT INTO user (username, password_hash, email, isAdmin) VALUES (?, ?, ?, 0)");
				$stmt->bind_param("sss", $_POST["username"], $_POST["password"], $_POST["email"]);
				$stmt->execute();
				
				$_SESSION['logInBool'] = true;
				// Save the username to be used on other pages
				$_SESSION['username'] = $_POST["username"];
				// Redirect to the home page
				header("Location: home.php");
			}
		?>
		
		<div>
			<h1 align="center">Register</h1>
			<!-- rest of body -->
			<form method="post" class="main-form">
				<div class="input-row">
					<label for="username">Username</label>
					<input id="username" name="username" type="text">
				</div>

				<div class="input-row">
					<label for="password">Password</label>
					<input id="password" name="password" type="password">
				</div>

				<div class="input-row">
					<label for="email">Email</label>
					<input id="email" name="email" type="email" required>
				</div>

				<input type="submit" value="Register">
			</form>
		</div>
	</body>
</html>
