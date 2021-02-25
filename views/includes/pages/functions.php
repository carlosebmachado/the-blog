<?php

if (isset($_POST['post_comment']))
{
    $id = $_POST['id'];
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://$_SERVER[HTTP_HOST]/blog/post?id=".$id;
    header('Location: '.$url);

    $name = $_POST['name'];
    $message = $_POST['message'];

    $comment =  new \models\Comment(null, $name, $message, date('Y-m-d'), $id);
    $comment->insert();

    unset($_POST['post_comment']);
    unset($_POST['name']);
    unset($_POST['message']);
}

if (isset($_POST['send_message']))
{
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://$_SERVER[HTTP_HOST]/blog/contact";
    header('Location: '.$url);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $contact_message =  new \models\ContactMessage(null, $name, $email, $message);
    $contact_message->insert();

    unset($_POST['post_comment']);
    unset($_POST['name']);
    unset($_POST['message']);
}
