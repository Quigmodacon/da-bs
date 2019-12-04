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
			<?php include 'database.php';
				$orgID = $_GET['orgID'];
				$sql = $conn->prepare('SELECT * FROM organism WHERE organismID = ?');
				$sql->bind_param('i', $orgID);
				$sql->execute();
				$sql->bind_result($organismID, $orgName, $sciName, $type);
				$sql->fetch();
				
				echo '<h1 align="center">' . $orgName . '</h1>';
				echo '<div id="paraOne">';
				echo '<image src="images/' . $sciName . '" alt="' . $orgName . '" style="width:256px; display:block; margin-left:auto; margin-right:auto; margin-bottom:20px;">';
				echo '<div id="paraOne">';
				echo '<table>';
				echo '<tr><th colspan="2">' . $orgName . '</th></tr>';
				echo '<tr><td style="padding:15px;">Scientific Name</td><td style="padding:15px;">' . $sciName . '</td></tr>';
				echo '<tr><td style="padding:15px;">Organism Type</td><td style="padding:15px;">' . $type . '</td></tr>';
				echo '</table>';
				echo '</div>';
				echo '</div>';
			?>
				
		</div>
	</body>
</html>
