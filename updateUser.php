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
		<?php require 'database.php'; ?>
		<?php include 'check_login.php'; ?>
<?php if ($_SESSION['isAdmin']) : ?>
		<?php include 'adminNav.php'; ?>
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
	</body>
</html>
