<?php 
include 'confs/auth.php';
$title = "New Category";include '../layouts/header-admin.php';
?>
<!-- body open tag -->

<div class="col-md-10 offset-md-1 border border-success b-w-3 mt-3 p-0">
	<h1 class="bg-success text-white p-2 font-b font-24">New Category</h1>
	<form action="cat-add.php" method="post" class="m-3">
		<div class="form-group">
			<label for="name">Category Name</label>
			<input type="text" class="form-control" id="name" name="name">
		</div>
		<div class="form-group">
			<label for="remark">Remark</label>
			<textarea class="form-control" id="remark" rows="3" name="remark"></textarea>
		</div>
		<a href="cat-list.php" class="btn btn-light float-right">Back</a>
		<button type="submit" class="btn btn-success">Add Category</button>
	</form>
</div>

<!-- body close tag -->
<?php include '../layouts/footer.php';?>

