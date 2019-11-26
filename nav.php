<div class="topnav">
	<a href="home.php">Home</a>
	<a href="organisms.php">Organisms</a>
	<a href="biomes.php">Biomes</a>
	<a href="locations">Locations</a>
	<a href="about.php">About</a>
	<!-- <a href="account.php">Account</a> -->
	<div class="search-container">
		<form action="search.php" style="margin-bottom: 6px;">
			<input type="text" placeholder="Search.." name="search">
			<button type="submit">GO</button>
		</form>
	</div>
	<?php if( ! $loggedIn ) : ?>
		<button onclick="window.location.href = 'login.php';">Login</button>
	<?php else : ?>
		<a href="account.php">Account</a>
		<button onclick="window.location.href = 'logout.php';">Logout</button>
	<?php endif; ?>
</div>
