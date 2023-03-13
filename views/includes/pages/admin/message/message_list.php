<div class="row">
    <div class="col-sm bg-white m-1 p-3 rounded">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                    <th scope="col">View</th>
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
    
    $cms = \models\ContactMessage::select_on_interval($page_amt, $offset);

    foreach ($cms as $cm)
    {
        $new_message = $cm->get_message();
        if (strlen($new_message) > 100)
        {
            $new_message = substr($new_message, 0, 100).'...';
        }
    ?>
                <tr>
                    <td><?php echo $cm->get_id() ?></td>
                    <td><?php echo $cm->get_name() ?></td>
                    <td><?php echo $cm->get_email() ?></td>
                    <td><?php echo $new_message ?></td>
                    <td>
                    <form action="../admin/messages?action=view" method="POST">
                        <input type="hidden" name="id" value="<?php echo $cm->get_id() ?>">
                        <button name="find_id" class="btn btn-info">View</button>
                    </form>
                    </td>
                    <td>
                    <form action="../admin/messages?action=delete" method="POST">
                        <input type="hidden" name="id" value="<?php echo $cm->get_id() ?>">
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
            <a class="btn btn-outline-primary my-2 my-sm-0<?php if (count($cms) < $page_amt) echo ' disabled' ?>" href="<?php echo '?action=list&page='.$next_page ?>">></a>
        </div>
    </div>
</div>
