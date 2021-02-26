<?php
$curPage = basename($_SERVER['REQUEST_URI']);
session_start();
if (isset($_SESSION['logged']))
{

}
else
{
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://$_SERVER[HTTP_HOST]/blog/login";
    header('Location: '.$url);
}
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Carlos Machado">
	<link rel="icon" href="/<?php echo Config::BASE_NAME ?>/assets/img/favicons/favicon.ico">

	<title>The Blog - Dashboard</title>

	<!-- Bootstrap core CSS -->
	<link href="/<?php echo Config::BASE_NAME ?>/assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap"><a class="nav-link" href="#">Sign out</a></li>
        </ul>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-inline-block bg-dark sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white active" aria-current="page" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Commentaries</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Messages</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
