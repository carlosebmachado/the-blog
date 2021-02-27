<?php
$id = '';
$title = '';
$post_date = '';
$summary = '';
$body = '';
$call_img = '';

if (isset($_POST['find_id']))
{
    $post = \models\Article::select_by_id($_POST['id']);
    if ($post != null)
    {
        $id = (string)$post->get_id();
        $title = $post->get_title();
        $post_date = $post->get_post_date();
        $summary = $post->get_summary();
        $body = $post->get_body();
        $call_img = $post->get_call_img();
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
                        <input type="text" name="post_date" class="form-control" id="post_date" value="<?php echo $post_date ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="<?php echo $title ?>">
            </div>
            <div class="form-group">
                <label for="summary">Summary</label>
                <textarea name="summary" class="form-control" id="summary"><?php echo $summary ?></textarea>
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" class="form-control" id="body"><?php echo $body ?></textarea>
            </div>
            <div class="form-group">
                <label for="call_img">Call image: </label>
                <img class="mb-3" src="<?php if ($call_img != '') echo 'data:image/jpeg;base64, '.base64_encode($call_img) ?>" style="width: 10%;" alt="About image">
                <input type="file" name="call_img" class="form-control-file" id="call_img">
            </div>
            <button type="submit" name="edit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
