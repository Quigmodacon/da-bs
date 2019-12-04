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
				// Check the user credentials
				include 'database.php';
				$username = $_POST["username"];
				$password = $_POST["password"];
				$stmt = $conn->prepare("SELECT COUNT(userID) FROM user WHERE username = ? AND password_hash = ?");
				$stmt->bind_param("ss", $username, $password);
				$stmt->execute();
				// Bind the result. See https://www.php.net/manual/en/mysqli-stmt.bind-result.php
				$stmt->bind_result($result);
                                if ($stmt->fetch() && $result > 0) {
					$_SESSION['logInBool'] = true;
					// Save the username to be used on other pages
					$_SESSION['username'] = $username;
					// Check admin status
					$stmt->close();
echo 'befor';
					$sql = $conn->prepare("SELECT isAdmin FROM user WHERE username = ? and password_hash = ?");
					$sql->bind_param("ss", $username, $password);
					$sql->execute();
echo 'executed';
					$sql->bind_result($admin);
					$sql->fetch();
					$_SESSION['isAdmin'] = $admin;
					// Redirect to the home page
					header("Location: home.php");
				} else {
					echo '<p style="text-align: center;">Incorrect username or password entered.</p>';
				}
				$conn->close();
			}
		?>
		<div>
			<h1 align="center">Login</h1>
			<!-- rest of body -->
			<div id="paraOne">
                        <form method="post" class="main-form">
				<div class="input-row">
					<label for="username">Username</label>
					<input id="username" name="username" type="text">
				</div>

				<div class="input-row">
					<label for="password">Password</label>
					<input id="password" name="password" type="password">
				</div>

				<input type="submit" value="Login">
                                <p>Not a user? <a href="register.php">Register here.</a></p>
			</form>
			</div>
		</div>
	</body>
</html>
