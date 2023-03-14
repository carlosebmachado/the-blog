<?php

namespace controllers;

class LoginController extends Controller
{
  public function index()
  {
    if (isset($_POST['verify_login'])) {
      \models\Login::virify_login($_POST['uid'], $_POST['pwd']);
    }

    \views\View::render('admin/login.php', \views\View::FLAG_NO_HEADER_FOOTER, \views\View::FLAG_NO_HEADER_FOOTER);
  }
}
