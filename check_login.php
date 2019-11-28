<?php
// Check to ensure that a given user is logged in.
// If no user is logged in redirect to the login page.
//
// Include this in all pages that need to verify that a user is logged in
//

if (!$_SESSION['logInBool']) {
	header('Location: login.php');
}

?>
