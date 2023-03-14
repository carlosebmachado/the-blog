<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$curPage = basename($_SERVER['REQUEST_URI']);
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Carlos Machado">
	<link rel="icon" href="<?php echo Config::BASE_NAME ?>assets/img/favicons/favicon.ico">

	<title>The Blog - Admin login</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo Config::BASE_NAME ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Config::BASE_NAME ?>assets/css/all.css" rel="stylesheet">
	<link href="<?php echo Config::BASE_NAME ?>assets/css/style.css" rel="stylesheet">
</head>

<body>

	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="../home" target="_blanc">The Blog</a>
				<span class="navbar-text">ADMIN PANEL</span>
			</div>
		</nav>
	</header>

	<main>
		
		<div class="container w-25 mt-5">
			<form method="post">
				<div class="form-group">
					<label for="uid">User</label>
					<input type="text" name="uid" class="form-control" id="uid">
				</div>
				<div class="form-group">
					<label for="pwd">Password</label>
					<input type="password" name="pwd" class="form-control" id="pwd">
				</div>
				<?php
				if (isset($_SESSION['ERR'])) {
					echo '<div class="alert alert-danger" role="alert">' . $_SESSION['ERR'] . '</div>';
					unset($_SESSION['ERR']);
				}
				?>
				<button class="btn btn-primary w-100" type="submit" name="verify_login">Login</button>
			</form>
		</div>

	</main>

	<!-- Bootstrap core JavaScript -->
	<script src="<?php echo Config::BASE_NAME ?>assets/js/vendor/jquery-3.2.1.slim.min.js"></script>
	<script src="<?php echo Config::BASE_NAME ?>assets/js/vendor/popper.min.js"></script>
	<script src="<?php echo Config::BASE_NAME ?>assets/js/bootstrap/bootstrap.min.js"></script>
</body>

</html>