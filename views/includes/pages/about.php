<?php
$about_info = \models\AboutInfo::select();
$hasphoto = $about_info->get_photo() == '' ? false : true;
?>

<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md">
            <h2 class="text-center">About me</h2>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md">
            <?php echo $about_info->get_about() ?>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md">
            <?php if ($hasphoto) { ?>
            <img class="about-avatar" src="<?php echo 'data:image/jpeg;base64,'.base64_encode($about_info->get_photo()) ?>" alt="My photo">
            <?php } ?>
            <h3 class="d-inline-block my-0 ml-2"><?php echo $about_info->get_name() ?></h3>
        </div>
    </div>
</div>
