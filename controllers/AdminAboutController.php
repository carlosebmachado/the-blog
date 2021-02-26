<?php

namespace controllers;

class AdminAboutController extends Controller
{
	public function index()
	{
		\models\Login::verify_logout();

		if (isset($_GET['action']))
		{
			$action = $_GET['action'];
			switch ($action)
			{
				case 'edit':
					\views\View::render('admin_about_edit.php', 'dashboard_header.php', 'dashboard_footer.php');
					break;
				default:
					\views\View::render('admin_about_edit.php', 'dashboard_header.php', 'dashboard_footer.php');
			}
		}
	}
}
