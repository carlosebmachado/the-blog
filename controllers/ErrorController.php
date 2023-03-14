<?php

namespace controllers;

class ErrorController extends Controller
{
  public function index()
  {
    \views\View::render('error.php');
  }
}
