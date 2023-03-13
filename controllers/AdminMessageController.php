<?php

namespace controllers;

class AdminMessageController extends Controller
{
	public function index()
	{
		\models\Login::verify_logout();

		if (isset($_POST['delete']))
		{
			$id = $_POST['id'];

			\models\ContactMessage::delete_by_id($id);
		}

		if (isset($_GET['action']))
		{
			$action = $_GET['action'];
			switch ($action)
			{
				case 'list':
					\views\View::render('admin/message/message_list.php', 'dashboard_header.php', 'dashboard_footer.php');
					break;
				case 'view':
					\views\View::render('admin/message/message_view.php', 'dashboard_header.php', 'dashboard_footer.php');
					break;
				case 'delete':
					\views\View::render('admin/message/message_delete.php', 'dashboard_header.php', 'dashboard_footer.php');
					break;
				default:
					\views\View::render('admin/message/message_list.php', 'dashboard_header.php', 'dashboard_footer.php');
			}
		}
	}
}
