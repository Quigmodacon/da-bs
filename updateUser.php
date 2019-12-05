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
		<?php include 'check_login.php'; ?>
<?php if ($_SESSION['isAdmin']) : ?>
		<?php include 'adminNav.php'; ?>
		<main class="container" role="main">
		<div>
			<?php
				include 'database.php';
				if ( isset($_POST['username']) && isset($_POST['isAdmin'])) {
					$uername = $_POST['username'];
					$isAdmin = $_POST['isAdmin'];
					$sql = $conn->prepare("UPDATE user SET isAdmin = ? WHERE username = ?");	
					$sql->bind_param('is', $isAdmin, $username);
					$sql->execute();
				}	 
			?>
			<h1 align="center">Update</h1>
			<!-- rest of body -->
			<div id="paraOne">
				<h3 align="center">Update User</h3>
                <form method="post" class="main-form" action="">
					<div class="input-row">
						<label for="username">Username</label>
						<input id="username" name="username" type="text">
					</div>
					<div class="input-row">
						<label for="isAdmin">Has Admin Privileges</label>
						<select id="isAdmin" name="isAdmin" style="font-size: 20px;">
							<option value="0">No</option>
							<option value="1">Yes</option>
						</select>
					</div>
					<input type="submit" value="Update" style="font-size: 20px;">
				</form>
			</div>
		</div>
<?php endif ?>
		</main>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>
