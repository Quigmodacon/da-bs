<!DOCTYPE>
<html>
	<head>
		<title>Jonathan Hansen</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body id="hellspawn">
		<?php session_start(); ?>
		<?php $loggedIn = $_SESSION['logInBool'] ?? false ?>
		<!-- header -->	
		<?php include 'nav.php';?>		
                <?php include 'check_login.php'; ?>
		<div>
			<h1 align="center">Home</h1>
			<?php echo '<p style="text-align: center;">Welcome <strong>' . $_SESSION['username'] . '</strong>!</p>'; ?>
			<!-- rest of body -->
			<div id="paraOne">
				<p>Go ahead and look through our database, we are currently working on adding new organisms every week.</p>
			</div>
		</div>
	</body>
</html>
