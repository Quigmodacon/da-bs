<nav class="navbar navbar-expand-lg navbar-dark bg-gradient-primary">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav_page navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="organisms.php">Organisms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="biomes.php">Biomes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="locations.php">Locations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
        </ul>
        <span class="growspan"></span>
        <ul class="nav_account navbar-nav mr-3">
    <?php if ($_SESSION["logInBool"] ?? false): ?>
          <li class="nav-item">
            <a class="nav-link" href="account.php">Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
	<?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
	<?php endif; ?>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
          <input class="search_input form-control mr-sm-2" type="text" placeholder="Search.." aria-label="Search" name="search">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Go</button>
        </form>
      </div>
</nav>
