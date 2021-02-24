<?php

namespace controllers;

class PostController extends Controller
{
	public function index()
	{
		\views\PostView::render('post.php');
	}
}
