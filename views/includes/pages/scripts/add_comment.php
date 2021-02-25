<?php
    var_dump($_POST);

    $name = $_GET['name'];
    $message = $_GET['message'];

    $comment =  new \models\Comment(null, $name, $message, date('Y-m-d'), $id);
    $comment->insert();

    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://$_SERVER[HTTP_HOST]/blog/post?id=".$id;
    header('Location: '.$url);
    //echo '<script>history.go(-1);</script>';
?>