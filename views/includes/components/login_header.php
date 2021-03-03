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
	
	<link href="<?php echo Config::BASE_NAME ?>assets/css/style.css" rel="stylesheet">
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="../home">The Blog</a>
				<a class="navbar-text" href="#">Admin</a>
			</div>
		</nav>
	</header>
	<main>
