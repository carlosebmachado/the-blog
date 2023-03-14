<?php

?>
<div class="row">
  <div class="col-sm bg-white m-1 p-3 rounded">
    <form enctype="multipart/form-data" method="POST">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" value="">
      </div>
      <div class="form-group">
        <label for="body">Body</label>
        <textarea name="body" class="form-control" id="body"></textarea>
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control-file" id="image">
      </div>
      <button type="submit" name="new" class="btn btn-success">New</button>
    </form>
  </div>
</div>