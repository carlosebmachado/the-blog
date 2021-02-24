<?php

namespace controllers;

class AboutController extends Controller
{
	public function index()
	{
		\views\AboutView::render('about.php');
	}
}
