<?php

namespace controllers;

class HomeController extends Controller
{
  public function index()
  {
    \views\View::render('home.php');
  }
}
