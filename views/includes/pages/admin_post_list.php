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
    $page_amt = 5;
    $cur_page = 1;
    $offset = 0;
    if(isset($_GET['page']))
    {
        $cur_page = (int)$_GET['page'];
        for ($i = 1; $i < $cur_page; $i++)
        {
            $offset += $page_amt;
        }
    }
    
    $blog_posts = \models\BlogPost::select_on_interval($page_amt, $offset);

    foreach ($blog_posts as $blog_post)
    {
        $new_summary = $blog_post->get_summary();
        if (strlen($new_summary) > 100)
        {
            $new_summary = substr($new_summary, 0, 100).'...';
        }
    ?>
                <tr>
                    <td><?php echo $blog_post->get_id() ?></td>
                    <td><?php echo $blog_post->get_title() ?></td>
                    <td><?php echo $blog_post->get_date() ?></td>
                    <td><?php echo $new_summary ?></td>
                    <td>
                    <form action="../admin/posts?action=edit" method="POST">
                        <input type="hidden" name="id" value="<?php echo $blog_post->get_id() ?>">
                        <button name="find_id" class="btn btn-primary">Edit</button>
                    </form>
                    </td>
                    <td>
                    <form action="../admin/posts?action=delete" method="POST">
                        <input type="hidden" name="id" value="<?php echo $blog_post->get_id() ?>">
                        <button name="find_id" class="btn btn-danger">Delete</button>
                    </form>
                    </td>
                </tr>
    <?php
    }
    $next_page = $cur_page + 1;
    $previous_page = $cur_page > 1 ? $cur_page - 1 : 1;
    ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <a class="btn btn-outline-primary my-2 my-sm-0<?php if ($cur_page == 1) echo ' disabled' ?>" href="<?php echo '?action=list&page='.$previous_page ?>"><</a>
            <a class="mx-3 mt-1" href="#"><span><?php echo $cur_page ?></span></a>
            <a class="btn btn-outline-primary my-2 my-sm-0<?php if (count($blog_posts) < $page_amt) echo ' disabled' ?>" href="<?php echo '?action=list&page='.$next_page ?>">></a>
        </div>
    </div>
</div>
