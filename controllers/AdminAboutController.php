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
			$image_name = '';

			if ($_FILES["image"]["error"] == UPLOAD_ERR_OK)
			{
				$tmp_name = $_FILES["image"]["tmp_name"];
				$image_name = $name.'_'.basename($_FILES["image"]["name"]);
				move_uploaded_file($tmp_name, '..'.\Config::ABOUT_IMAGE_PATH.$image_name);
			}

			$about = \models\AboutInfo::select();
			$about->update($name, $about_text, $image_name);
		}

		if (isset($_GET['action']))
		{
			$action = $_GET['action'];
			switch ($action)
			{
				case 'edit':
					\views\View::render('admin/about/about_edit.php', 'dashboard_header.php', 'dashboard_footer.php');
					break;
				default:
					\views\View::render('admin/about/about_edit.php', 'dashboard_header.php', 'dashboard_footer.php');
			}
		}
	}
}
