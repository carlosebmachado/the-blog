<?php

namespace controllers;

class FunctionsController extends Controller
{
	public function index()
	{
		\views\FunctionsView::render('functions.php');
	}
}
