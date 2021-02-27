<?php

?>
<div class="row">
    <div class="col-sm bg-white m-1 p-3 rounded">
        <form method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="">
            </div>
            <div class="form-group">
                <label for="summary">Summary</label>
                <textarea name="summary" class="form-control" id="summary"></textarea>
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" class="form-control" id="body"></textarea>
            </div>
            <div class="form-group">
                <label for="call_img">Call image: </label>
                <img class="mb-3" src="" style="width: 10%;" alt="About image">
                <input type="file" name="call_img" class="form-control-file" id="call_img">
            </div>
            <button type="submit" name="new" class="btn btn-success">New</button>
        </form>
    </div>
</div>
