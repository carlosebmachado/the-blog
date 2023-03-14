<?php

namespace controllers;

class ContactController extends Controller
{
  public function index()
  {
    if (isset($_POST['send_message'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $message = $_POST['message'];

      $contact_message =  new \models\ContactMessage(null, $name, $email, date('Y-m-d'), $message);
      $contact_message->insert();
    }

    \views\View::render('contact.php');
  }
}
