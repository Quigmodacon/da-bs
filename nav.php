<div class="topnav">
	<a href="home.php">Home</a>
	<a href="organisms.php">Organisms</a>
	<a href="biomes.php">Biomes</a>
	<a href="locations.php">Locations</a>
	<a href="favorites.php">Favorites</a>
	<a href="about.php">About</a>

	<div class="search-container">
		<form method="get" action="search.php" style="margin-bottom: 6px;">
			<input type="text" placeholder="Search.." name="search" id="search">
			<button type="submit" name="go" id="go">GO</button>
		</form>
	</div>
	<?php if ($_SESSION["logInBool"]): ?>
	<a href="account.php" class="account-button">Account</a>
	<a href="logout.php" class="account-button">Logout</a>
	<?php else: ?>
	<a href="login.php" class="account-button">Login</a>
	<?php endif; ?>
</div>
