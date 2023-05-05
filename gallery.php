<?php
	session_start();
	require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Hotel Reservation</title>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />

		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<!-- NAVBAR -->
		<nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
			<div class="container">
				<a href="index.php" class="navbar-brand">Online Hotel Reservation</a>

				<ul class="navbar-nav">
					<li class="nav-item"><a href="gallery.php" class="nav-link active">Gallery</a></li>
					<li class="nav-item"><a href="rooms.php" class="nav-link">Rooms</a></li>
					<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
				</ul>
				
				<?php if (isset($_SESSION['myid'])): ?>
					<span><a class="text-secondary text-decoration-none" href="logout.php">Logout</a></span>
				<?php else: ?>
					<a href="login.php" class="btn btn-primary">Login</a>
				<?php endif; ?>
			</div>
		</nav>

		<div class="container marg justify-content-center">
			<div class="row">
				<div class="col">
					<div class="card text-bg-light text-center mb-4" style="width: 25rem">
						<a href="pool-area.php">
							<img src="img/hero-2.jpg" class="card-img-top" alt="..." />
							<div class="card-body">
								<p class="card-text">Pool Area</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col">
					<div class="card text-bg-light text-center mb-4" style="width: 25rem">
						<a href="dining-area.php">
							<img src="img/dining-2.jpg" class="card-img-top" alt="..." />
							<div class="card-body">
								<p class="card-text">Dining Area</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col">
					<div class="card text-bg-light text-center mb-4" style="width: 25rem">
						<a href="lounge-area.php">
							<img src="img/lounge-3.jpg" class="card-img-top" alt="..." />
							<div class="card-body">
								<p class="card-text">Lounge Area</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col">
					<div class="card text-bg-light text-center mb-4" style="width: 25rem">
						<a href="indi-gallery.php">
							<img src="img/room-2.jpg" class="card-img-top" alt="..." />
							<div class="card-body">
								<p class="card-text">Room Area</p>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
			crossorigin="anonymous"
		></script>
	</body>
</html>
