<?php

namespace controllers;

class LoginController extends Controller
{
	public function __construct($view, $model)
	{
		parent::__construct($view, $model);
	}

	public function index()
	{
		if (isset($_POST['action']))
		{
			if ($this->model->validateLogin($_POST['uid'], $_POST['pwd']))
				die('Logged');
			else
				die('Wrong');
		}
		$this->view->render('login.php');
	}
}
