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

	<title>The Blog - Your daily slice of knowledge</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo Config::BASE_NAME ?>assets/css/bootstrap.min.css" rel="stylesheet">
	
	<link href="<?php echo Config::BASE_NAME ?>assets/css/style.css" rel="stylesheet">
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="home">The Blog</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item<?php if ($curPage == Config::BASE_NAME || $curPage == 'home') echo ' active' ?>">
							<a class="nav-link" href="home">Home<?php if ($curPage == Config::BASE_NAME || $curPage == 'home') echo ' <span class="sr-only">(current)</span>' ?></a>
						</li>
						<li class="nav-item<?php if ($curPage == 'about') echo ' active' ?>">
							<a class="nav-link" href="about">About<?php if ($curPage == 'about') echo ' <span class="sr-only">(current)</span>' ?></a>
						</li>
						<li class="nav-item<?php if ($curPage == 'contact') echo ' active' ?>">
							<a class="nav-link" href="contact">Contact<?php if ($curPage == 'contact') echo ' <span class="sr-only">(current)</span>' ?></a>
						</li>
					</ul>
					<form class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
					</form>
				</div>
			</div>
		</nav>
	</header>
	<main>
