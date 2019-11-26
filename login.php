<!DOCTYPE>
<html>
	<head></head>
	<body>
		<?php 
			session_start();
			
			unset($_SESSION['logInBool']);
			$loggedIn = true;
			$_SESSION['logInBool'] = $loggedIn;
		?>
		<meta http-equiv="Refresh" content="0; url=https://dbdev.cs.kent.edu/~jhanse12/da-bs/home.php" />
	</body>
</html>
