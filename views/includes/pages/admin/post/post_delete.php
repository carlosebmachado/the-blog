<?php
$id = '';
$title = '';
$post_date = '';
$likes = '';
$body = '';
$call_img = '';

if (isset($_POST['find_id'])) {
  $post = \models\Post::select_by_id($_POST['id']);
  if ($post != null) {
    $id = (string)$post->get_id();
    $title = $post->get_title();
    $post_date = $post->get_date();
    $likes = $post->get_likes();
    $body = $post->get_body();
    $call_img = $post->get_image();
  }
}
$hasphoto = $call_img == '' ? false : true;
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
          <div class="col">
            <label for="likes">Likes</label>
            <input disabled type="text" name="likes" class="form-control" id="likes" value="<?php echo $likes ?>">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="title">Title</label>
        <input disabled type="text" name="title" class="form-control" id="title" value="<?php echo $title ?>">
      </div>
      <div class="form-group">
        <label for="body">Body</label>
        <textarea disabled name="body" class="form-control" id="body"><?php echo $body ?></textarea>
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <?php if ($hasphoto) { ?>
          <img class="admin-image mb-3" src="data:image/png;base64,<?php echo $call_img ?>" alt="About image">
        <?php } ?>
      </div>
      <button type="submit" name="delete" class="btn btn-danger">Delete</button>
    </form>
  </div>
</div>