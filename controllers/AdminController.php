<?php

namespace controllers;

class AdminController extends Controller
{
	public function index()
	{
		\models\Login::verify_logout();

		\views\AdminView::render('admin.php', 'dashboard_header.php', 'dashboard_footer.php');
	}
}
