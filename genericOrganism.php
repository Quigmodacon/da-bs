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
                <?php include 'check_login.php'; ?>
		<div>
			<?php include 'database.php'
				
				$sql = $conn->prepare('SELECT * FROM organism WHERE organismID = ?');
			?>
			<h1 align="center">Home</h1>
			<!-- rest of body -->
			<div id="paraOne">
				
			</div>
		</div>
	</body>
</html>
