<div class="container mt-5">
    <?php
    $pageAmt = 10;
    $curPage = 1;
    $offset = 0;
    if(isset($_GET['page']))
    {
        $curPage = (int)$_GET['page'];
        for ($i = 1; $i < $curPage; $i++)
        {
            $offset += $pageAmt;
        }
    }
    
    $articles = \models\Article::select_on_interval($pageAmt, $offset);

    foreach ($articles as $article)
    {
    ?>
    <div class="row mt-4">
        <div class="col-md-4 contain">
            <img class="img-fluid"  src="<?php echo 'data:image/jpeg;base64,'.base64_encode($article->get_call_img()) ?>" alt="Blog call image">
        </div>
        <div class="col-md-8">
            <a href="<?php echo 'post?id='.$article->get_id() ?>"><h2><?php echo $article->get_title() ?></h2></a>
            <small class="text-muted"><?php echo $article->get_post_date() ?></small>
            <p><?php echo $article->get_summary() ?></p>
        </div>
        <span class="border-bottom mx-auto w-75 mt-1"></span>
    </div>
    <?php
    }
    $nextPage = $curPage + 1;
    $previousPage = $curPage > 1 ? $curPage - 1 : 1;
    ?>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="d-flex justify-content-center">
                <a class="btn btn-outline-primary my-2 my-sm-0<?php if ($curPage == 1) echo ' disabled' ?>" href="<?php echo '?page='.$previousPage ?>"><</a>
                <a class="mx-3 mt-1" href="#"><span><?php echo $curPage ?></span></a>
                <a class="btn btn-outline-primary my-2 my-sm-0<?php if (count($articles) < $pageAmt) echo ' disabled' ?>" href="<?php echo '?page='.$nextPage ?>">></a>
            </div>
        </div>
    </div>
</div>
