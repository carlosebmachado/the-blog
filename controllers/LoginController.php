<?php

namespace controllers;

class LoginController extends Controller
{
	public function index()
	{
		if (isset($_POST['verify_login']))
		{
			if (session_status() === PHP_SESSION_NONE) session_start();

			$user = \models\User::select($_POST['uid'], $_POST['pwd']);
			
			if ($user != null)
			{
				$_SESSION['LOGGED'] = true;
				$_SESSION['USER_NAME'] = $user->get_name();
				header('Location: http://localhost/blog/admin');
				die();
			}
			else
			{
				$_SESSION['ERR'] = 'Wrong user or password.';
			}
		}
		\views\LoginView::render('login.php', 'login_header.php', 'login_footer.php');
	}
}
