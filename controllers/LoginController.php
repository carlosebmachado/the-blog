<?php

namespace controllers;

class LoginController extends Controller
{
	public function index()
	{
		if (isset($_POST['verify_login']))
		{
			if ($this->model->validateLogin($_POST['uid'], $_POST['pwd']))
				die('Logged');
			else
				die('Wrong');
		}
		\views\LoginView::render('login.php', 'login_header.php', 'login_footer.php');
	}
}
