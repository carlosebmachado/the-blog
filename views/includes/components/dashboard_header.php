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
    <link href="<?php echo Config::BASE_NAME ?>assets/css/all.min.css" rel="stylesheet">
	<link href="<?php echo Config::BASE_NAME ?>assets/css/style.css" rel="stylesheet">
</head>

<body>
    <header class="dashboard-header bg-dark shadow">
        <div class="logo-bg text-center">
            <a class="text-white" target="_blank" href="/blog">The Blog</a>
        </div>
        <ul class="list-unstyled float-right">
            <li class=""><a class="text-white" href="?logout">Sign out</a></li>
        </ul>
    </header>

    <nav class="dashboard-side-menu bg-dark d-inline-block mt-0">
        <div class="position-sticky">
            <ul class="nav flex-column">
                <li class="nav-item m-0 p-0">
                    <a class="nav-link text-white m-0 py-1<?php if ($pageName == 'Dashboard') echo ' selected' ?>" href="../admin/dashboard"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li class="nav-item m-0 p-0">
                    <a class="nav-link text-white m-0 py-1<?php if ($pageName == 'About - Edit') echo ' selected' ?>" href="../admin/about?action=edit"><i class="fas fa-info-circle"></i> About</a>
                </li>
                <li class="nav-item m-0 p-0">
                    <a class="nav-link text-white m-0 py-1<?php if ($pageName == 'Posts - List') echo ' selected' ?>" href="../admin/posts?action=list"><i class="fas fa-newspaper"></i> Posts</a>
                    <?php if (substr($pageName, 0, 5) == 'Posts') { ?>
                    <a class="nav-link bg-light border-right border-bottom text-dark m-0 py-1<?php if ($pageName == 'Posts - New') echo ' selected-sub' ?>" href="../admin/posts?action=new">New</a>
                    <a class="nav-link bg-light border-right border-bottom text-dark m-0 py-1<?php if ($pageName == 'Posts - Edit') echo ' selected-sub' ?>" href="../admin/posts?action=edit">Edit</a>
                    <a class="nav-link bg-light border-right border-bottom text-dark m-0 py-1<?php if ($pageName == 'Posts - Delete') echo ' selected-sub' ?>" href="../admin/posts?action=delete">Delete</a>
                    <?php } ?>
                </li>
                <li class="nav-item m-0 p-0">
                    <a class="nav-link text-white m-0 py-1<?php if ($pageName == 'Commentaries - List') echo ' selected' ?>" href="../admin/commentaries?action=list"><i class="fab fa-microblog"></i> Commentaries</a>
                    <?php if (substr($pageName, 0, 12) == 'Commentaries') { ?>
                    <a class="nav-link bg-light border-right border-bottom text-dark m-0 py-1<?php if ($pageName == 'Commentaries - View') echo ' selected-sub' ?>" href="../admin/commentaries?action=view">View</a>
                    <a class="nav-link bg-light border-right border-bottom text-dark m-0 py-1<?php if ($pageName == 'Commentaries - Delete') echo ' selected-sub' ?>" href="../admin/commentaries?action=delete">Delete</a>
                    <?php } ?>
                </li>
                <li class="nav-item m-0 p-0">
                    <a class="nav-link text-white m-0 py-1<?php if ($pageName == 'Messages - List') echo ' selected' ?>" href="../admin/messages?action=list"><i class="fas fa-envelope-square"></i> Messages</a>
                    <?php if (substr($pageName, 0, 8) == 'Messages') { ?>
                    <a class="nav-link bg-light border-right border-bottom text-dark m-0 py-1<?php if ($pageName == 'Messages - View') echo ' selected-sub' ?>" href="../admin/messages?action=view">View</a>
                    <a class="nav-link bg-light border-right border-bottom text-dark m-0 py-1<?php if ($pageName == 'Messages - Delete') echo ' selected-sub' ?>" href="../admin/messages?action=delete">Delete</a>
                    <?php } ?>
                </li>
            </ul>
        </div>
    </nav>

    <main class="dashboard-wrapper bg-light">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3">
            <h2><?php echo $pageName ?></h2>
        </div>

