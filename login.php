<!DOCTYPE>
<html>
	<head>
		<title>Jonathan Hansen</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body id="hellspawn">
		<?php session_start(); ?>
		<?php $loggedIn = $_SESSION['logInBool'] ?>
		<!-- header -->	
		<?php include 'nav.php';?>		

		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				include 'database.php';
				$stmt = $conn->prepare("SELECT username, password_hash FROM user WHERE username = ? AND password_hash = ?");
				$stmt->bind_param("ss", $_POST["username"], $_POST["password"])
				$stmt->execute();
				//
				if ($stmt->num_rows > 0) {
					$_SESSION['logInBool'] = true;
					// Redirect to the home page
					header("Location: home.php");
				} else {
					echo "<p>Incorrect username or password entered.</p>"
				}
				$conn->close();
			}
		?>
		<div>
			<h1 align="center">Login</h1>
			<!-- rest of body -->
                        <form method="post" class="main-form">
				<div class="input-row">
					<label for="username">Username</label>
					<input id="username" name="username" type="text">
				</div>

				<div class="input-row">
					<label for="password">Password</label>
					<input id="password" name="pasword" type="password">
				</div>

				<input type="submit" value="Login">
                                <p>Not a user? <a href="register.php">Register here.</a></p>
			</form>
		</div>
	</body>
</html>
