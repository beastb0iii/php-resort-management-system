<?php
	session_start();
	$error = "";

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		if(!$DB = new PDO("mysql:host=localhost; dbname=hotel_reservation", "root", "")) {
            die("could not connect to the database");
        }

		$arr['email'] = $_POST['email'];
		$arr['password'] = $_POST['password'];

		$query = "SELECT * FROM users WHERE email = :email && password = :password limit 1";

		$stm = $DB->prepare($query);

		if($stm) {
			$check = $stm->execute($arr);

			if($check) {
				$data = $stm->fetchAll(PDO::FETCH_ASSOC);

				if(is_array($data) &&  count($data) > 0) {
					$_SESSION['myid'] = $data[0]['id'];
					$_SESSION['myname'] = $data[0]['name'];
					$_SESSION['myemail'] = $data[0]['email'];
					$_SESSION['myrank'] = $data[0]['rank'];
				}
				else {
					$error = "wrong username or password";
				}
			}

			if($error == "") {
				// $refurl = isset($_POST['refurl']) ? base64_decode($_POST['refurl']) : '';

				if(isset($_SESSION['myrank']) && $_SESSION['myrank'] == "admin") {
					header("Location: admin.php");
					die;
				}
				// elseif(!empty($refurl)) {
				// 	header("Location: $refurl");
				// 	die;
				// }
				else {
					header("Location: index.php");
					die;
				}
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
		<title>Login Form</title>
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
                <div class="login form">
                    <header>Login</header>
                    <form action="" method="POST">
                        <input type="text" name="email" placeholder="Enter your email" />
                        <input type="password" name="password" placeholder="Enter your password" />
						<input type="hidden" name="refurl" value="<?php echo base64_encode($_SERVER['HTTP_REFERER']); ?>" />
                        <input type="submit" class="button" value="Login" />
                    </form>
                    <div class="signup">
                        <span class="signup"
                            >Don't have an account?
                            <a href="signup.php">Signup</a>
                        </span>
                    </div>
                </div>
            </div>
		</div>
	</body>
</html>
