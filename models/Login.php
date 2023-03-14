<?php

namespace models;

class Login extends Model
{
  public static function virify_login($uid, $pwd)
  {
    if (session_status() === PHP_SESSION_NONE) session_start();

    $user = \models\User::select($uid, md5($pwd));

    if ($user != null) {
      $_SESSION['LOGGED'] = true;
      $_SESSION['USER_NAME'] = $user->get_name();
      header('Location: ../admin/dashboard');
      die();
    } else {
      $_SESSION['ERR'] = 'Wrong user or password.';
    }
  }

  public static function verify_logout()
  {
    if (session_status() === PHP_SESSION_NONE) session_start();

    if (isset($_GET['logout'])) {
      unset($_SESSION['LOGGED']);
    }

    if (!isset($_SESSION['LOGGED'])) {
      header('Location: ../admin/login');
      die();
    }
  }
}
