<div class="container mt-5">
    <?php
    // echo $_SERVER['HTTP_HOST'];
    // echo '<br>';
    // echo $_SERVER['REQUEST_URI'];
    $pageAmt = 10;

    $curPage = 1;
    $offset = 0;
    if(isset($_GET['page']))
    {
        //echo $_GET['page'];
        $curPage = (int)$_GET['page'];
        for ($i = 1; $i < $curPage; $i++)
        {
            $offset += $pageAmt;
        }
    }
    // echo $begin;
    // echo '<br>';
    // echo $end;
    $articles = \models\Article::selectOnInterval($pageAmt, $offset);

    // echo '<bg>';
    // echo count($articles);

    foreach ($articles as $article) {
        $ptPostDate = date("d/m/Y", strtotime($article->getPostDate()))
    ?>
    <div class="row mt-5">
        <div class="col-md-4 contain">
            <img class="img-fluid"  src="<?php echo 'data:image/jpeg;base64,'.base64_encode($article->getCallImg()) ?>" alt="Blog call image">
        </div>
        <div class="col-md-8">
            <a href=""><h2><?php echo $article->getTitle() ?></h2></a>
            <small class="text-muted"><?php echo $ptPostDate ?></small>
            <p><?php echo $article->getSummary() ?></p>
        </div>
    </div>
    <?php
    }
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://$_SERVER[HTTP_HOST]/blog/";
    $nextPage = $curPage + 1;
    $previousPage = $curPage > 1 ? $curPage - 1 : 1;
    ?>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="d-flex justify-content-center">
                <a class="btn btn-outline-primary my-2 my-sm-0<?php if ($curPage == 1) echo ' disabled' ?>" href="<?php echo $url.'?page='.$previousPage ?>"><</a>
                <a class="mx-3 mt-1" href="#"><span><?php echo $curPage ?></span></a>
                <a class="btn btn-outline-primary my-2 my-sm-0<?php if (count($articles) < $pageAmt) echo ' disabled' ?>" href="<?php echo $url.'?page='.$nextPage ?>">></a>
            </div>
        </div>
    </div>
</div>
