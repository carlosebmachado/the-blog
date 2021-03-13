<?php
$about_info = \models\AboutInfo::select();
$hasphoto = $about_info->get_photo() == '' ? false : true;
?>
<div class="row">
    <div class="col-sm bg-white m-1 p-3 rounded">
        <form enctype="multipart/form-data" method="POST">
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
                <img class="admin-image mb-3" src="<?php echo Config::ABOUT_IMAGE_PATH.$about_info->get_photo() ?>" alt="About image">
                <?php } ?>
                <input type="file" name="image" class="form-control-file" id="image">
            </div>
            <a class="btn btn-info" href="<?php echo \Config::BASE_NAME.'about' ?>" target="_blanc">View</a>
            <button class="btn btn-primary" type="submit" name="save">Save</button>
        </form>
    </div>
</div>
