<!DOCTYPE>
<html>
	<head>
		<title>Jonathan Hansen</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">
	</head>
	<body id="hellspawn">
		<!-- header -->	
                <?php session_start(); ?>
		<?php include 'nav.php'; ?>
		<?php require 'database.php'; ?>
		<?php include 'check_login.php'; ?>
<?php if($_SESSION['isAdmin']) : ?>
		<?php include 'adminNav.php'; ?>
		<main class="container" role="main">
		<div>
			<?php
				include 'database.php';
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    // nothing
                }
				else if (!empty($_POST['oName']) && !empty($_POST['sName']) && !empty($_POST['type'])) {
					$oName = $_POST['oName'];
					$sName = $_POST['sName'];
					$type = $_POST['type'];
					$sql = $conn->prepare("INSERT INTO organism (orgName, sciName, orgType) VALUES (?, ?, ?)");	
					$sql->bind_param('sss', $oName, $sName, $type);
					$sql->execute();
					echo '<p class="message success">Success</p>';
				}	 
				else if (!empty($_POST['bName'])) {
					$bName = $_POST['bName'];
					$sql = $conn->prepare("INSERT INTO biome (bioName) VALUES (?)");
					$sql->bind_param('s', $bName);
					$sql->execute();
					echo '<p class="message success">Success</p>';
				}
	 			else if (!empty($_POST['lName'])) {
					$lName = $_POST['lName'];
					$sql = $conn->prepare("INSERT INTO location (locName) VALUES (?)");
					$sql->bind_param('s', $lName);
					$sql->execute();
					echo '<p class="message success">Success</p>';
				}
				else {
					echo '<p class="message error">Not enough information</p>';
				}
			?>
			<h1>Insert</h1>
			<!-- rest of body -->
			<div id="paraOne">
				<h3>Insert Organism</h3>
                <form method="post" class="main-form">
                    <div class="form-group">
                        <label for="oName">Organism Name</label>
                        <input type="text" class="form-control" id="oName" name="oName">
                    </div>
                    <div class="form-group">
                        <label for="sName">Scientific Name</label>
                        <input type="text" class="form-control" id="sName" name="sName">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="type">Type</label>
                        </div>
                        <select class="custom-select" id="type" name="type">
							<option selected value="Animal">Animal</option>
							<option value="Plant">Plant</option>
							<option value="Fungie">Fungie</option>
                        </select>
                    </div>
                    <button type="submit" value="Insert" class="btn btn-outline-light">Submit</button>
                </form>
				<br><br><br>
				<h3>Insert Biome</h3>
                <form method="post" class="main-form">
                    <div class="form-group">
                        <label for="bName">Biome Name</label>
                        <input type="text" class="form-control" id="bName" name="bName">
                    </div>
                    <button type="submit" value="Insert" class="btn btn-outline-light">Submit</button>
                </form>
				<br><br><br>
				<h3>Insert Location</h3>
                <form method="post" class="main-form">
                    <div class="form-group">
                        <label for="lName">Location Name</label>
                        <input type="text" class="form-control" id="lName" name="lName">
                    </div>
                    <button type="submit" value="Insert" class="btn btn-outline-light">Submit</button>
                </form>
			</div>
		</div>
<?php endif ?>
	</main>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>
