<div class="row">
    <div class="col-sm bg-white m-1 p-3 rounded">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Post Date</th>
                    <th scope="col">Name</th>
                    <th scope="col">Message</th>
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
    
    $comments = \models\Comment::select_on_interval($pageAmt, $offset);

    foreach ($comments as $comment)
    {
        $new_message = $comment->get_message();
        if (strlen($new_message) > 100)
        {
            $new_message = substr($new_message, 0, 100).'...';
        }
    ?>
                <tr>
                    <td><?php echo $comment->get_id() ?></td>
                    <td><?php echo $comment->get_post_date() ?></td>
                    <td><?php echo $comment->get_name() ?></td>
                    <td><?php echo $new_message ?></td>
                    <td>
                    <form action="../admin/commentaries?action=delete" method="POST">
                        <input type="hidden" name="id" value="<?php echo $comment->get_id() ?>">
                        <button name="find_id" class="btn btn-danger">Delete</button>
                    </form>
                    </td>
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
            <a class="btn btn-outline-primary my-2 my-sm-0<?php if (count($comments) < $pageAmt) echo ' disabled' ?>" href="<?php echo '?action=list&page='.$nextPage ?>">></a>
        </div>
    </div>
</div>
