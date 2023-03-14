<?php

namespace controllers;

class AboutController extends Controller
{
  public function index()
  {
    \views\View::render('about.php');
  }
}
