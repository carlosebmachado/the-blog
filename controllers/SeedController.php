<?php

namespace controllers;

class SeedController extends Controller
{
	public function index()
	{
		\views\View::render('seed.php');
	}
}
