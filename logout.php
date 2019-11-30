<!DOCTYPE>
<html>
	<head></head>
	<body>
		<?php 
			session_start();
			
			unset($_SESSION['logInBool']);
			unset($_SESSION['username']);
			// Redirect to the login page on logout
			header("Location: login.php");
		?>
	</body>
</html>
