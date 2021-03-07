<?php
$posts_count = \models\BlogPost::count();
$comments_count = \models\BlogPostCommentary::count();
$messages_count = \models\ContactMessage::count();
$comments_average = round($comments_count / $posts_count, 2);
?>
<div class="row">
    <div class="col-sm bg-white m-1 p-3 rounded">
        <h5>Posts</h5>
        <h6>Total of posts: <?php echo $posts_count ?></h6>
        <h6>Average comments per post: <?php echo $comments_average ?></h6>
    </div>
    <div class="col-sm bg-white m-1 p-3 rounded">
        <h5>Commentaries</h5>
        <h6>Total of comments: <?php echo $comments_count ?></h6>
    </div>
    <div class="col-sm bg-white m-1 p-3 rounded">
        <h5>Messages</h5>
        <h6>Total of messages: <?php echo $messages_count ?></h6>
    </div>
</div>
<div class="row h-50">
    <div class="col-sm bg-white m-1 p-3 rounded">
        <div class="h-100"></div>
    </div>
    <div class="col-sm bg-white m-1 p-3 rounded">
        <div class="h-100"></div>
    </div>
</div>
