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
					<li class="nav-item"><a href="about.php" class="nav-link active">About</a></li>
				</ul>
				
				<?php if (isset($_SESSION['myid'])): ?>
					<span><a class="text-secondary text-decoration-none" href="logout.php">Logout</a></span>
				<?php else: ?>
					<a href="login.php" class="btn btn-primary">Login</a>
				<?php endif; ?>
			</div>
		</nav>

		<div class="container marg">
			<section class="p-5">
				<div class="container">
					<div class="row g-4">
						<div class="col-4">
							<h2 class="text-center mb-4">Contact Info</h2>
							<ul class="list-group lead text-center">
								<li class="list-group-item my-3">
									<span class="fw-bold">Location:</span><br />
									Zamboanga City, Philippines
								</li>
								<li class="list-group-item my-3">
									<span class="fw-bold">Phone:</span><br />
									+639XXXXXXXXX
								</li>
								<li class="list-group-item my-3">
									<span class="fw-bold">Telephone:</span><br />
									(25-555-XXXX)
								</li>
								<li class="list-group-item my-3">
									<span class="fw-bold">Email</span><br />
									example@email.com
								</li>
							</ul>
						</div>
						<div class="col-lg-8">
							<img src="img/about.jpg" class="img-fluid rounded" alt="" />
						</div>
					</div>
				</div>
			</section>
		</div>
		<footer class="p-5 bg-dark text-white text-center fixed-bottom"></footer>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
			crossorigin="anonymous"
		></script>
	</body>
</html>
