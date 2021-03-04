<div class="container mt-5">
    <?php
    $page_amt = 10;
    $cur_page = 1;
    $offset = 0;
    if(isset($_GET['q']))
    {
        
    }
    if(isset($_GET['page']))
    {
        $cur_page = (int)$_GET['page'];
        for ($i = 1; $i < $cur_page; $i++)
        {
            $offset += $page_amt;
        }
    }
    
    $results;

    foreach ($results as $result)
    {
    ?>
    <div class="row mt-4 border-bottom">
        <div class="col-md-4 contain mx-0">
            <img class="img-fluid"  src="<?php echo Config::BLOG_POST_IMAGE_PATH.$blog_post->get_image() ?>" alt="Blog call image">
        </div>
        <div class="col-md-8">
            <a href="<?php echo 'post?id='.$blog_post->get_id() ?>"><h2><?php echo $blog_post->get_title() ?></h2></a>
            <small class="text-muted"><?php echo $blog_post->get_date() ?></small>
            <p><?php echo $blog_post->get_summary() ?></p>
        </div>
    </div>
    <?php
    }
    $next_page = $cur_page + 1;
    $previous_page = $cur_page > 1 ? $cur_page - 1 : 1;
    ?>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="d-flex justify-content-center">
                <a class="btn btn-outline-primary my-2 my-sm-0<?php if ($cur_page == 1) echo ' disabled' ?>" href="<?php echo '?page='.$previous_page ?>"><</a>
                <a class="mx-3 mt-1" href="#"><span><?php echo $cur_page ?></span></a>
                <a class="btn btn-outline-primary my-2 my-sm-0<?php if (count($blog_posts) < $page_amt) echo ' disabled' ?>" href="<?php echo '?page='.$next_page ?>">></a>
            </div>
        </div>
    </div>
</div>
