<?php

namespace controllers;

class TestController extends Controller
{
	public function index()
	{
		\views\View::render('test.php');
	}
}
