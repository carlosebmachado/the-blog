<?php

namespace controllers;

class LoginController extends Controller
{
	public function index()
	{
		if (isset($_POST['action']))
		{
			if ($this->model->validateLogin($_POST['uid'], $_POST['pwd']))
				die('Logged');
			else
				die('Wrong');
		}
		\views\LoginView::render('login.php');
	}
}
