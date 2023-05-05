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
					<li class="nav-item"><a href="gallery.php" class="nav-link">Gallery</a></li>
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

		<!-- HERO -->
		<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
			<div class="carousel-indicators">
				<button
					type="button"
					data-bs-target="#carouselExampleCaptions"
					data-bs-slide-to="0"
					class="active"
					aria-current="true"
					aria-label="Slide 1"
				></button>
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="img/hero-1.jpg" class="d-block w-100" alt="..." />

					<div class="carousel-caption d-none d-md-block">
						<h5>Finding a hotel to stay in?</h5>
						<p>
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam at tempore, aspernatur consectetur non harum sit officia temporibus.
						</p>
						<p><a href="rooms.php" class="btn btn-primary mt-3">Book Room</a></p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="img/hero-2.jpg" class="d-block w-100" alt="..." />
				</div>
				<div class="carousel-item">
					<img src="img/hero-3.jpg" class="d-block w-100" alt="..." />
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
			crossorigin="anonymous"
		></script>
	</body>
</html>
