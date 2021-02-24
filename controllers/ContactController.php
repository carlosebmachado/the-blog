<?php

namespace controllers;

class ContactController extends Controller
{
	// public function __construct($view, $model)
	// {
	// 	parent::__construct($view, $model);
	// }

	public function index()
	{
		\views\ContactView::render('contact.php');
	}
}
