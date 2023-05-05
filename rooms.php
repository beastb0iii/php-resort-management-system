<?php
	session_start();
	require_once "connect.php";

	$sqlquery = "SELECT * FROM rooms";
	$results = mysqli_query($conn, $sqlquery);
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
					<li class="nav-item"><a href="rooms.php" class="nav-link active">Rooms</a></li>
					<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
				</ul>
				
				<?php if (isset($_SESSION['myid'])): ?>
					<span><a class="text-secondary text-decoration-none" href="logout.php">Logout</a></span>
				<?php else: ?>
					<a href="login.php" class="btn btn-primary">Login</a>
				<?php endif; ?>
			</div>
		</nav>

		<div class="container marg rooms">
			<?php

				if(isset($_SESSION["reserved"])) {
					?>
					<div class="text-center alert alert-success" role="alert">
						<?php echo $_SESSION["reserved"]; ?>
					</div>
					<?php unset($_SESSION["reserved"]); 
				}
			?>

			<div class="row">
				<?php
					while($data = mysqli_fetch_array($results)) {
						?>
						<div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">
							<div class="card-item">
								<?php if($data['room_name'] == "Double Bed Room"): ?>
									<img src="img/room-1.jpg" class="img-fluid" alt="..." />
								<?php elseif($data['room_name'] == "Master Bed Room"): ?>
									<img src="img/room-2.jpg" class="img-fluid" alt="..." />
								<?php elseif($data['room_name'] == "Queen Size Room"): ?>
									<img src="img/room-3.jpg" class="img-fluid" alt="..." />
								<?php else: ?>
									<img src="img/room-4.jpg" class="img-fluid" alt="..." />
								<?php endif; ?>
								<div class="card-content">
									<div class="mb-3 text-center">
										<h3><?php echo $data['room_name']; ?></h3>
									</div>

									<div class="price d-flex justify-content-between align-items-center">
										<div class="d-flex align-items-center">
											<span>₱<?php echo $data['price']; ?> per night</span>
										</div>
										<a href="reservation-form.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">Book Now</a>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
				?>
				
			</div>
			<div class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="d-flex">
					<div class="toast-body">
						Hello, world! This is a toast message.
					</div>
					<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
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
