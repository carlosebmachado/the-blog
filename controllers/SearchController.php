<?php

namespace controllers;

class SearchController extends Controller
{
	public function index()
	{
		\views\View::render('search.php');
	}
}
