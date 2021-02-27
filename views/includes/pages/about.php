<?php
$about = \models\About::select();
?>

<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md">
            <h2 class=""><?php echo $about->get_name() ?></h2>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md mx-auto">
            <img class="img-fluid w-25" src="<?php echo 'data:image/jpeg;base64,'.base64_encode($about->get_photo()) ?>" alt="My photo">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md">
            <?php echo $about->get_about() ?>
        </div>
    </div>
</div>
