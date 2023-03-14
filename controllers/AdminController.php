<?php

namespace controllers;

class AdminController extends Controller
{
  public function index()
  {
    \models\Login::verify_logout();

    \views\View::render('admin/dashboard.php', 'dashboard_header.php', 'dashboard_footer.php');
  }
}
