<?php

namespace controllers;

class CategoriesController extends Controller
{
	public function index()
	{
		\views\CategoriesView::render('categories.php');
	}
}
