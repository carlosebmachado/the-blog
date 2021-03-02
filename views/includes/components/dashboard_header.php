<?php
$curPage = basename($_SERVER['REQUEST_URI']);
if ($curPage != 'dashboard')
    $pageName = ucfirst(explode('?', $curPage)[0]).' - '.ucfirst($_GET['action']);
else
    $pageName = ucfirst($curPage);
?>

<!doctype html>
<html class="h-100" lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Carlos Machado">
	<link rel="icon" href="/<?php echo Config::BASE_NAME ?>/assets/img/favicons/favicon.ico">

	<title>The Blog - Dashboard</title>

	<!-- Bootstrap core CSS -->
	<link href="/<?php echo Config::BASE_NAME ?>/assets/css/bootstrap.min.css" rel="stylesheet">

	<link href="/<?php echo Config::BASE_NAME ?>/assets/css/style.css" rel="stylesheet">
</head>

<body class="h-100">
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow" style="height: 5%;">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">The Blog</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap"><a class="nav-link" href="?logout">Sign out</a></li>
        </ul>
    </header>

    <div class="container-fluid" style="height: 95%;">
        <div class="row h-100">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 bg-dark collapse h-100 d-inline-block">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../admin/dashboard"><h5>Dashboard</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../admin/about?action=edit"><h5>About</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white mb-0 pb-0" href="../admin/posts?action=list"><h5>Posts</h5></a>
                            <a class="nav-link text-white my-0 py-0" href="../admin/posts?action=new">New</a>
                            <a class="nav-link text-white my-0 py-0" href="../admin/posts?action=edit">Edit</a>
                            <a class="nav-link text-white mt-0 pt-0" href="../admin/posts?action=delete">Delete</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white mb-0 pb-0" href="../admin/commentaries?action=list"><h5>Commentaries</h5></a>
                            <a class="nav-link text-white mt-0 pt-0" href="../admin/commentaries?action=delete">Delete</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white mb-0 pb-0" href="../admin/messages?action=list"><h5>Messages</h5></a>
                            <a class="nav-link text-white mt-0 pt-0" href="../admin/messages?action=delete">Delete</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light h-100">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="h2"><?php echo $pageName ?></h1>
                </div>

