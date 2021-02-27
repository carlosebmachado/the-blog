<div class="row">
    <div class="col-sm bg-white m-1 p-3 rounded">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Post Date</th>
                    <th scope="col">Summary</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
    <?php
    $pageAmt = 5;
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
        $new_summary = $article->get_summary();
        if (strlen($new_summary) > 100)
        {
            $new_summary = substr($new_summary, 0, 100).'...';
        }
    ?>
                <tr>
                    <td><?php echo $article->get_id() ?></td>
                    <td><?php echo $article->get_title() ?></td>
                    <td><?php echo $article->get_post_date() ?></td>
                    <td><?php echo $new_summary ?></td>
                    <td><a href="../admin/posts?action=edit">Edit</a></td>
                    <td><a href="../admin/posts?action=delete">Delete</a></td>
                </tr>
    <?php
    }
    $nextPage = $curPage + 1;
    $previousPage = $curPage > 1 ? $curPage - 1 : 1;
    ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <a class="btn btn-outline-primary my-2 my-sm-0<?php if ($curPage == 1) echo ' disabled' ?>" href="<?php echo '?action=list&page='.$previousPage ?>"><</a>
            <a class="mx-3 mt-1" href="#"><span><?php echo $curPage ?></span></a>
            <a class="btn btn-outline-primary my-2 my-sm-0<?php if (count($articles) < $pageAmt) echo ' disabled' ?>" href="<?php echo '?action=list&page='.$nextPage ?>">></a>
        </div>
    </div>
</div>



