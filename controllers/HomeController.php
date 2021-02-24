<?php

namespace controllers;

class HomeController extends Controller
{
	public function index()
	{
		\views\HomeView::render('home.php');
	}
}
