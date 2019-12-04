<!DOCTYPE>
<html>
	<head>
		<title>Jonathan Hansen</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">
	</head>
	<body id="hellspawn">
		<?php session_start(); ?>
		<?php $loggedIn = $_SESSION['logInBool'] ?? false ?>
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
		<main class="container" role="main">
			<h1 id="headertext">Login</h1>
			<!-- rest of body -->
			<div id="paraOne">
            <form method="post" class="main-form">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-outline-light">Submit</button>
                <p id="logswitch">Not a user? <a href="register.php">Register here.</a></p>
			</form>
			</div>
		</main>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>
