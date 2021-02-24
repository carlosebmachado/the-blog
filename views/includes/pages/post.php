<div class="container mt-5">
    <?php

    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $article = \models\Article::select_by_id($id);

    $ptPostDate = date("d/m/Y", strtotime($article->get_post_date()));
    $new_body = str_replace('\r\n', '<br>', $article->get_body());

    ?>
    <div class="row">
        <div class="col-md">
            <h2 class="mb-0"><?php echo $article->get_title() ?></h2>
            <small class="text-muted"><?php echo $ptPostDate ?></small>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <img class="img-fluid" src="<?php echo 'data:image/jpeg;base64,'.base64_encode($article->get_call_img()) ?>" alt="Blog call image">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md">
            <p><?php echo $new_body ?></p>
        </div>
    </div>
    <!--
        TODO: Comments system
        Name and Message field and a button to send
        comments
        (
            id,
            name,
            message,
            id_article
        )
     -->
</div>
