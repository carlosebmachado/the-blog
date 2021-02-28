<?php

namespace controllers;

class TestController extends Controller
{
	public function index()
	{
		\views\ContactView::render('test.php');
	}
}
