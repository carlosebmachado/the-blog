<!-- 
    Post
 -->
<div class="container mt-5">
    <?php

    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $blog_post = \models\BlogPost::select_by_id($id);

    //$ptPostDate = date("d/m/Y", strtotime($blog_post->get_post_date()));
    $new_body = str_replace('\r\n', '<br>', $blog_post->get_body());

    ?>
    <div class="row">
        <div class="col-md">
            <h2 class="mb-0"><?php echo $blog_post->get_title() ?></h2>
            <small class="text-muted"><?php echo $blog_post->get_date() ?></small>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <img class="img-fluid" src="<?php echo 'data:image/jpeg;base64,'.base64_encode($blog_post->get_image()) ?>" alt="Blog call image">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md">
            <p><?php echo $new_body ?></p>
        </div>
    </div>
</div>
<!-- 
    Comments
 -->
<div class="container w-50 mt-5">
    <h2>Comments:</h2>
    <?php
    $comments = \models\BlogPostCommentary::select_by_blog_post_id($id);
    foreach ($comments as $comment)
    {
    ?>
    <div class="mt-5">
        <div class="row">
            <div class="col-md">
                <p class="title">By <?php echo $comment->get_name() ?> <span><small class="text-muted">on <?php echo $comment->get_post_date() ?></small></span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <p class=""><?php echo $comment->get_message() ?></p>
            </div>
        </div>
        <span class="row border-bottom mx-auto mt-1"></span>
    </div>
     <?php
    }
     ?>
</div>
<!-- 
    Comment form
-->
<div class="container w-50 mt-5">
    <div class="row mt-5">
        <div class="col-md">
            <h2>Leave a commentary:</h2>
            <form method="post" action="">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="message">Commentary</label>
                    <textarea name="message" class="form-control" id="message"></textarea>
                </div>
                <button type="submit" name="post_comment" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
