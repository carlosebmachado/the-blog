<?php

namespace controllers;

class AdminPostController extends Controller
{
  public function index()
  {
    \models\Login::verify_logout();

    if (isset($_POST['new'])) {
      $title = $_POST['title'];
      $body = $_POST['body'];
      $base64_image = '';

      if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["image"]["tmp_name"];
        $image_data = file_get_contents($tmp_name);
        $base64_image = base64_encode($image_data);
      }

      $article = new \models\Post(null, $title, date('Y-m-d'), 0, $body, $base64_image);
      $article->insert();
    }

    if (isset($_POST['edit'])) {
      $id = $_POST['id'];
      $title = $_POST['title'];
      $body = $_POST['body'];
      $base64_image = '';

      if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["image"]["tmp_name"];
        $image_data = file_get_contents($tmp_name);
        $base64_image = base64_encode($image_data);
      }

      $article = \models\Post::select_by_id($id);
      $article->update($title, null, null, $body, $base64_image);
    }

    if (isset($_POST['delete'])) {
      $id = $_POST['id'];
      \models\Post::delete_by_id($id);
    }

    if (isset($_GET['action'])) {
      $action = $_GET['action'];
      switch ($action) {
        case 'new':
          \views\View::render('admin/post/post_new.php', 'dashboard_header.php', 'dashboard_footer.php');
          break;
        case 'list':
          \views\View::render('admin/post/post_list.php', 'dashboard_header.php', 'dashboard_footer.php');
          break;
        case 'edit':
          \views\View::render('admin/post/post_edit.php', 'dashboard_header.php', 'dashboard_footer.php');
          break;
        case 'delete':
          \views\View::render('admin/post/post_delete.php', 'dashboard_header.php', 'dashboard_footer.php');
          break;
        default:
          \views\View::render('admin/post/post_list.php', 'dashboard_header.php', 'dashboard_footer.php');
      }
    }
  }
}
