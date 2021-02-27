<?php
$about = \models\About::select();
?>
<div class="row">
    <div class="col-sm bg-white m-1 p-3 rounded">
        <form method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="<?php echo $about->get_name() ?>">
            </div>
            <div class="form-group">
                <label for="about">About text</label>
                <textarea name="about" class="form-control" id="about"><?php echo $about->get_about() ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image: </label>
                <img class="mb-3" src="<?php echo 'data:image/jpeg;base64, '.base64_encode($about->get_photo()) ?>" style="width: 10%;" alt="About image">
                <input type="file" name="image" class="form-control-file" id="image">
            </div>
            <button type="submit" name="save" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
