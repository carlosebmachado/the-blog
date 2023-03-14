<?php

namespace controllers;

class AdminAboutController extends Controller
{
	public function index()
	{
		\models\Login::verify_logout();

		if (isset($_POST['save'])) {
			$name = $_POST['name'];
			$about_text = $_POST['about'];
			$base64_image = '';

			if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
				// $tmp_name = $_FILES["image"]["tmp_name"];
				// $image_name = $name.'_'.basename($_FILES["image"]["name"]);
				// move_uploaded_file($tmp_name, '..'.\Config::ABOUT_IMAGE_PATH.$image_name);
				$tmp_name = $_FILES["image"]["tmp_name"];
				$image_data = file_get_contents($tmp_name);
				$base64_image = base64_encode($image_data);
			}

			$last_about = \models\About::select_last();

			if ($last_about != null) {
				if ($image_data == null) {
					$base64_image = $last_about->get_photo();
				}
			}

			$about = new \models\About(null, $name, $about_text, $base64_image);
			$about->insert();
		}

		if (isset($_GET['action'])) {
			$action = $_GET['action'];
			switch ($action) {
				case 'edit':
					\views\View::render('admin/about/about_edit.php', 'dashboard_header.php', 'dashboard_footer.php');
					break;
				default:
					\views\View::render('admin/about/about_edit.php', 'dashboard_header.php', 'dashboard_footer.php');
			}
		}
	}
}
