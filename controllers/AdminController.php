<?php

namespace controllers;

class AdminController extends Controller
{
	public function index()
	{
		if (session_status() === PHP_SESSION_NONE) session_start();

		if (isset($_GET['logout']))
		{
			unset($_SESSION['LOGGED']);
		}
		if (!isset($_SESSION['LOGGED']))
		{
			$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://$_SERVER[HTTP_HOST]/blog/login";
			header('Location: '.$url);
			die();
		}
		\views\AdminView::render('admin.php', 'dashboard_header.php', 'dashboard_footer.php');
	}
}
