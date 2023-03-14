<?php

namespace controllers;

class PostController extends Controller
{
  public function index()
  {
    if (isset($_POST['post_comment'])) {
      $name = $_POST['name'];
      $message = $_POST['message'];
      $id = $_POST['id'];

      $comment =  new \models\Commentary(null, $name, $message, date('Y-m-d'), $id);
      $comment->insert();
    }

    \views\View::render('post.php');
  }
}
