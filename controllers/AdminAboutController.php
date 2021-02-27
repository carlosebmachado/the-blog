<?php

namespace controllers;

class AdminAboutController extends Controller
{
	public function index()
	{
		\models\Login::verify_logout();

		if (isset($_POST['save']))
		{
			$name = $_POST['name'];
			$about_text = $_POST['about'];
			$image = $_POST['image'];

			$about = \models\About::select();
			if (!$about->update($name, $about_text, $image))
			{
				print('deu erraa');
			}
		}

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
