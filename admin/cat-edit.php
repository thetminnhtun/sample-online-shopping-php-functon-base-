<?php 
include 'confs/auth.php';
$title = "Edit Category";include '../layouts/header-admin.php';
?>
<!-- body open tag -->

<div class="col-md-10 offset-md-1 border border-success b-w-3 mt-3 p-0">
<h1 class="bg-success text-white p-2 font-b font-24">Edit Category</h1>
<?php
include "confs/config.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM categories WHERE id = $id");

$row = mysqli_fetch_assoc($result);
?>

<form action="cat-update.php" method="post" class="m-3">
	<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
	<div class="form-group">
		<label for="name">Category Name</label>
		<input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'] ?>">
	</div>
	<div class="form-group">
		<label for="remark">Remark</label>
		<textarea class="form-control" id="remark" rows="3" name="remark">
		<?php echo $row['remark'] ?>
		</textarea>
	</div>
	<a href="cat-list.php" class="btn btn-light float-right">Back</a>
	<button type="submit" class="btn btn-success">Update Category</button>
</form>

<!-- body close tag -->
<?php include '../layouts/footer.php';?>