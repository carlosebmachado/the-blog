<?php

namespace controllers;

class AdminPostController extends Controller
{
	public function index()
	{
		\models\Login::verify_logout();

		if (isset($_POST['new']))
		{
			$title = $_POST['title'];
			$summary = $_POST['summary'];
			$body = $_POST['body'];
			$call_img = $_POST['call_img'];

			$article = new \models\BlogPost(null, $title, date('Y-m-d'), $summary, $body, $call_img);
			$article->insert();
		}

		if (isset($_POST['edit']))
		{
			$id = $_POST['id'];
			$title = $_POST['title'];
			$post_date = $_POST['post_date'];
			$summary = $_POST['summary'];
			$body = $_POST['body'];
			$image_name = '';

			if ($_FILES["image"]["error"] == UPLOAD_ERR_OK)
			{
				$tmp_name = $_FILES["image"]["tmp_name"];
				$image_name = $title.'_'.basename($_FILES["image"]["name"]);
				move_uploaded_file($tmp_name, '..'.\Config::ABOUT_IMAGE_PATH.$image_name);
			}

			$article = \models\BlogPost::select_by_id($id);
			$article->update($title, $post_date, $summary, $body, $image_name);
		}

		if (isset($_POST['delete']))
		{
			$id = $_POST['id'];

			\models\BlogPost::delete_by_id($id);
		}

		if (isset($_GET['action']))
		{
			$action = $_GET['action'];
			switch ($action)
			{
				case 'new':
					\views\View::render('admin_post_new.php', 'dashboard_header.php', 'dashboard_footer.php');
					break;
				case 'list':
					\views\View::render('admin_post_list.php', 'dashboard_header.php', 'dashboard_footer.php');
					break;
				case 'edit':
					\views\View::render('admin_post_edit.php', 'dashboard_header.php', 'dashboard_footer.php');
					break;
				case 'delete':
					\views\View::render('admin_post_delete.php', 'dashboard_header.php', 'dashboard_footer.php');
					break;
				default:
					\views\View::render('admin_post_list.php', 'dashboard_header.php', 'dashboard_footer.php');
			}
		}
	}
}
