<?php
	session_start();
	require_once "connect.php";

    if(!isset($_SESSION['myid'])) {
		
		header("Location: login.php");
        die;
	}

	$id = $_GET['id'];

	if($id) {
		$sql = "SELECT * FROM rooms WHERE id = $id";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);

		if(isset($_POST["submit"])) {
			$name = $_SESSION['myname'];
			$email = $_SESSION['myemail'];
			$room = $row["room_name"];
			$nights = mysqli_real_escape_string($conn, $_POST["nights"]);
			$amount = $row["price"] * $nights;

			$sqlInsert = "INSERT INTO reservation(name, email, room, nights, amount) VALUES ('$name', '$email', '$room', '$nights', '$amount')";

			if(mysqli_query($conn, $sqlInsert)) {
				$_SESSION["reserved"] = "Reservation is successful";
				header("Location: rooms.php");
			}
			else {
				die("Something went wrong");
			}
		}
	}
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

        <main id="reservation">
        <div class="container text-center">
            <div class="w-100 m-auto" id="form-signin">
            <form class="mt-5" method="POST">
				
				<h1 class="h3 mb-3 fw-normal">How many nights do you want to stay?</h1>

                <div class="mb-3">
					<input type="text" class="text-center form-control" name="nights" />
				</div>
				

				<input class="w-100 btn btn-lg btn-primary" name="submit" type="submit" value="Make Reservation">
			</form>
            </div>
        </div>
        <footer class="p-5 bg-dark text-white text-center fixed-bottom"></footer>
    </main>