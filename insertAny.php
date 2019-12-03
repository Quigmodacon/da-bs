<?php
	include 'database.php';
	if ( isset($_GET['oName']) && isset($_GET['sName'] && isset($_GET['type']) {
		$oName = $_GET['oName'];
		$sName = $_GET['sName'];
		$type = $_GET['type'];
		$sql = $conn->prepare("INSERT INTO organism (organismName, sciName, type) values (?, ?, ?);");	
		$sql->bind_param('sss', $oName, $sName, $type);
		$sql->execute();
	} 
/*	else if (isset($_GET[bName])) {

	}
	 else if (isset{$_GET[lName])) {

	} 
	else {
		echo '<p align="center">Not enough information</p>';
	}
*/
?>
