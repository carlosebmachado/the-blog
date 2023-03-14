<?php
$about_info = \models\About::select_last();
if ($about_info == null) {
  $about_info = new \models\About(1, '', '', '');
}
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
        <img class="about-avatar" src="data:image/png;base64,<?php echo $about_info->get_photo() ?>" alt="<?php echo $about_info->get_name() ?> profile picture">
      <?php } ?>
      <h3 class="d-inline-block my-0 ml-2"><?php echo $about_info->get_name() ?></h3>
    </div>
  </div>
</div>