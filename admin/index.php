<?php
$title = "Admin Login";include '../layouts/header-admin.php';
session_start();
if (isset($_SESSION['auth']))
	header("location: book-list.php");
?>
<!-- body open tag -->
<div class="col-md-6 offset-md-3 border border-success mt-5 p-0 b-w-3">
	<h3 class="bg-success p-3 text-center text-white">Login to Book Store Administration</h3>
	<form class="m-4" action="login.php" method="post">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" id="name" name="name">
		</div>
		<div class="form-group">
			<label for="pass">Password</label>
			<input type="password" class="form-control" id="pass" name="password">
		</div>
		<button type="submit" class="btn btn-primary float-right">Login</button>
		<div class="clearfix"></div>
	</form>
</div>
<!-- body close tag -->
<?php include '../layouts/footer.php';?>