<?php
$id = '';
$name = '';
$email = '';
$message = '';

if (isset($_POST['find_id']))
{
    $cm = \models\ContactMessage::select_by_id($_POST['id']);
    if ($cm != null)
    {
        $id = (string)$cm->get_id();
        $name = $cm->get_name();
        $email = $cm->get_email();
        $message = $cm->get_message();
    }
}
?>
<div class="row">
    <div class="col-sm bg-white m-1 p-3 rounded">
        <form method="post">
            <div class="form-group">
                <label for="id">ID</label><br>
                <input type="text" name="id" class="form-control d-inline-block w-25" id="id" value="<?php echo $id ?>">
                <button type="submit" name="find_id" class="btn btn-primary ml-3 mb-1">Find</button>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input disabled type="text" name="name" class="form-control" id="name" value="<?php echo $name ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input disabled type="email" name="email" class="form-control" id="email" value="<?php echo $email ?>">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea disabled name="message" class="form-control" id="message"><?php echo $message ?></textarea>
            </div>
            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
