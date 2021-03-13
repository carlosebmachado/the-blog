<div class="container w-25 mt-5">
	<form method="post">
		<div class="form-group">
			<label for="uid">User</label>
			<input type="text" name="uid" class="form-control" id="uid">
		</div>
		<div class="form-group">
			<label for="pwd">Password</label>
			<input type="password" name="pwd" class="form-control" id="pwd">
		</div>
		<?php
		if (isset($_SESSION['ERR']))
		{
			echo '<div class="alert alert-danger" role="alert">'.$_SESSION['ERR'].'</div>';
			unset($_SESSION['ERR']);
		}
		?>
		<button type="submit" name="verify_login" class="btn btn-primary">Login</button>
	</form>
</div>
