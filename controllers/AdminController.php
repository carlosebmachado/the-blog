<?php

namespace controllers;

class AdminController extends Controller
{
	public function index()
	{
		\views\AdminView::render('admin.php');
	}
}
