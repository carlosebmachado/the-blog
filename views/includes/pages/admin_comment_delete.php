<?php
$id = '';
$name = '';
$post_date = '';
$message = '';

if (isset($_POST['find_id']))
{
    $comment = \models\BlogPostCommentary::select_by_id($_POST['id']);
    if ($comment != null)
    {
        $id = (string)$comment->get_id();
        $name = $comment->get_name();
        $post_date = $comment->get_date();
        $message = $comment->get_message();
    }
}
?>
<div class="row">
    <div class="col-sm bg-white m-1 p-3 rounded">
        <form method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="id">ID</label><br>
                        <input type="text" name="id" class="form-control d-inline-block w-75" id="id" value="<?php echo $id ?>">
                        <button type="submit" name="find_id" class="btn btn-primary ml-3 mb-1">Find</button>
                    </div>
                    <div class="col">
                        <label for="post_date">Post date</label>
                        <input disabled type="text" name="post_date" class="form-control" id="post_date" value="<?php echo $post_date ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input disabled type="text" name="name" class="form-control" id="name" value="<?php echo $name ?>">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea disabled name="message" class="form-control" id="message"><?php echo $message ?></textarea>
            </div>
            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
