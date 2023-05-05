<?php
	session_start();
	require_once "connect.php";

    $sqlquery = "SELECT * FROM reservation";
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
				<a href="admin.php" class="navbar-brand">Online Hotel Reservation</a>

				<ul class="navbar-nav">
					<li class="nav-item"><a href="admin.php" class="nav-link active">Dashboard</a></li>
				</ul>

				<?php if (isset($_SESSION['myid'])): ?>
					<span><a class="text-secondary text-decoration-none" href="logout.php">Logout</a></span>
				<?php else: ?>
					<a href="login.php" class="btn btn-primary">Login</a>
				<?php endif; ?>
			</div>
		</nav>

		<main id="admin">
		<div class="container">
			<h1 class="text-center">Reservation List</h1>
			<table class="table table-bordered mt-5 text-center">
				<thead>
					<tr>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Room</th> 
						<th scope="col">No. Nights</th>
						<th scope="col">Total Amount</th>
					</tr>
				</thead>
				<tbody>

					<?php
						while($data = mysqli_fetch_array($results)){
							?>
							<tr>
							<td><?php echo $data['name'] ?></td>
							<td><?php echo $data['email'] ?></td>
							<td><?php echo $data['room'] ?></td>
							<td><?php echo $data['nights'] ?></td>
							<td><?php echo $data['amount'] ?></td>
							</tr>
							<?php
							
						}
					?>
				</tbody>
			</table>
		</div>
	</main>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
			crossorigin="anonymous"
		></script>
	</body>
</html>
