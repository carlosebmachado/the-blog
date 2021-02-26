<?php

namespace controllers;

class LoginController extends Controller
{
	public function index()
	{
		if (isset($_POST['verify_login']))
		{
			\models\Login::virify_login($_POST['uid'], $_POST['pwd']);
		}

		\views\LoginView::render('login.php', 'login_header.php', 'login_footer.php');
	}
}
