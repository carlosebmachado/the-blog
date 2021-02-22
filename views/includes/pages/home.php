<div class="container mt-5">
    <?php
    $articles = \models\HomeModel::selectAll();
    foreach ($articles as $article) {
        $article['post_date'] = date("d/m/Y", strtotime($article['post_date']))
    ?>
    <div class="row mt-5">
        <div class="col-md-4 contain">
            <img class="img-fluid"  src="<?php echo 'data:image/jpeg;base64,'.base64_encode($article['call_img']) ?>" alt="Test image">
        </div>
        <div class="col-md-8">
            <a href=""><h2><?php echo $article['title'] ?></h2></a>
            <small class="text-muted"><?php echo $article['post_date'] ?></small>
            <p><?php echo $article['summary'] ?></p>
        </div>
    </div>
    <?php
    }
    ?>
</div>
