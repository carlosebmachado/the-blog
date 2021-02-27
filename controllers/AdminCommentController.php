<?php

namespace controllers;

class AdminCommentController extends Controller
{
	public function index()
	{
		\models\Login::verify_logout();

		if (isset($_POST['delete']))
		{
			$id = $_POST['id'];

			\models\Comment::delete_by_id($id);
		}

		if (isset($_GET['action']))
		{
			$action = $_GET['action'];
			switch ($action)
			{
				case 'list':
					\views\View::render('admin_comment_list.php', 'dashboard_header.php', 'dashboard_footer.php');
					break;
				case 'delete':
					\views\View::render('admin_comment_delete.php', 'dashboard_header.php', 'dashboard_footer.php');
					break;
				default:
					\views\View::render('admin_comment_list.php', 'dashboard_header.php', 'dashboard_footer.php');
			}
		}
	}
}
