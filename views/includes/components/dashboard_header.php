<?php
$curPage = basename($_SERVER['REQUEST_URI']);
if ($curPage != 'dashboard')
    $pageName = ucfirst(explode('?', $curPage)[0]).' - '.ucfirst($_GET['action']);
else
    $pageName = ucfirst($curPage);
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Carlos Machado">
	<link rel="icon" href="<?php echo Config::BASE_NAME ?>assets/img/favicons/favicon.ico">

	<title>The Blog - Dashboard</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo Config::BASE_NAME ?>assets/css/bootstrap.min.css" rel="stylesheet">
    
	<link href="<?php echo Config::BASE_NAME ?>assets/css/style.css" rel="stylesheet">
</head>

<body>
    <header class="dashboard-header bg-dark shadow">
        <div class="logo-bg text-center">
            <a class="text-white m-0" target="_blank" href="/blog">The Blog</a>
        </div>
        <ul class="list-unstyled float-right m-0">
            <li class=""><a class="text-white" href="?logout">Sign out</a></li>
        </ul>
    </header>

    <nav class="dashboard-side-menu bg-dark d-inline-block mt-0">
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item m-0 p-0">
                    <a class="nav-link text-white m-0 py-1<?php if ($pageName == 'Dashboard') echo ' selected' ?>" href="../admin/dashboard"><h5>Dashboard</h5></a>
                </li>
                <li class="nav-item m-0 p-0">
                    <a class="nav-link text-white m-0 py-1<?php if ($pageName == 'About - Edit') echo ' selected' ?>" href="../admin/about?action=edit"><h5>About</h5></a>
                </li>
                <li class="nav-item m-0 p-0">
                    <a class="nav-link text-white m-0 py-1<?php if ($pageName == 'Posts - List') echo ' selected' ?>" href="../admin/posts?action=list"><h5>Posts</h5></a>
                    <a class="nav-link text-white m-0 py-1 px-4<?php if ($pageName == 'Posts - New') echo ' selected' ?>" href="../admin/posts?action=new">New</a>
                    <a class="nav-link text-white m-0 py-1 px-4<?php if ($pageName == 'Posts - Edit') echo ' selected' ?>" href="../admin/posts?action=edit">Edit</a>
                    <a class="nav-link text-white m-0 py-1 px-4<?php if ($pageName == 'Posts - Delete') echo ' selected' ?>" href="../admin/posts?action=delete">Delete</a>
                </li>
                <li class="nav-item m-0 p-0">
                    <a class="nav-link text-white m-0 py-1<?php if ($pageName == 'Commentaries - List') echo ' selected' ?>" href="../admin/commentaries?action=list"><h5>Commentaries</h5></a>
                    <a class="nav-link text-white m-0 py-1 px-4<?php if ($pageName == 'Commentaries - Delete') echo ' selected' ?>" href="../admin/commentaries?action=delete">Delete</a>
                </li>
                <li class="nav-item m-0 p-0">
                    <a class="nav-link text-white m-0 py-1<?php if ($pageName == 'Messages - List') echo ' selected' ?>" href="../admin/messages?action=list"><h5>Messages</h5></a>
                    <a class="nav-link text-white m-0 py-1 px-4<?php if ($pageName == 'Messages - Delete') echo ' selected' ?>" href="../admin/messages?action=delete">Delete</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="dashboard-wrapper bg-light">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3">
            <h2><?php echo $pageName ?></h2>
        </div>

