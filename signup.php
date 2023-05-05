<?php
	$error = "";

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		if(!$DB = new PDO("mysql:host=localhost; dbname=hotel_reservation", "root", "")) {
            die("could not connect to the database");
        }

		$arr['name'] = $_POST['name'];
		$arr['email'] = $_POST['email'];
		$arr['password'] = $_POST['password'];
		$arr['rank'] = "user";

		$query = "INSERT INTO users (name, email, password, rank) VALUES (:name, :email, :password, :rank)";

		$stm = $DB->prepare($query);

		if($stm) {
			$check = $stm->execute($arr);

			if(!$check) {
				$error = "could not save to database";
			}

			if($error == "") {
				header("Location: login.php");
				die;
			}
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>Registration Form</title>
		<!---Custom CSS File--->
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
				<!-- <a href="login.php" class="btn btn-primary">Login</a> -->
				<span class="hidden navbar-nav"><a href="" class="acn"></a></span>
			</div>
		</nav>
		<div class="container">
            <div class="auth">
                <div class="registration form">
                    <header>Signup</header>
					<?php
						if($error != "") {
							echo "<span style='color:red;'>$error</span><br><br>";
						}
					?>
                    <form action="" method="POST">
                        <input type="text" name="name" placeholder="Enter your name" />
                        <input type="email" name="email" placeholder="Enter your email" />
                        <input type="password" name="password" placeholder="Create a password" />
                        <input type="submit" class="button" value="Signup" />
                    </form>
                    <div class="signup">
                        <span class="signup"
                            >Already have an account?
                            <a href="login.php">Login</a>
                        </span>
                    </div>
                </div>
            </div>
		</div>
	</body>
</html>
