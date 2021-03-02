<?php
$about_info = \models\AboutInfo::select();
$hasphoto = true;
if ($about_info->get_photo() == '') $hasphoto = false;
?>
<div class="row">
    <div class="col-sm bg-white m-1 p-3 rounded">
        <form method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="<?php echo $about_info->get_name() ?>">
            </div>
            <div class="form-group">
                <label for="about">About text</label>
                <textarea name="about" class="form-control" id="about"><?php echo $about_info->get_about() ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image: </label>
                <?php if ($hasphoto) { ?>
                <img class="mb-3" src="<?php echo 'data:image/jpeg;base64, '.base64_encode($about_info->get_photo()) ?>" style="width: 10%;" alt="About image">
                <?php } ?>
                <input type="file" name="image" class="form-control-file" id="image">
            </div>
            <button type="submit" name="save" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
