<?php
include 'confs/auth.php';
$title = "View Category";include '../layouts/header-admin.php';
?>
<!-- body open tag -->

<div class="col-md-10 offset-md-1 border border-success b-w-3 mt-3 p-0">
	<h1 class="bg-success text-white p-2 font-b font-24 mb-0">Category List</h1>
	<?php
	include '../layouts/nav-admin.php';
	include "confs/config.php";
	$result = mysqli_query($conn, "SELECT * FROM categories");
	?>
	<ul class="list-group list-group-flush">
		<?php while ($row = mysqli_fetch_assoc($result)): ?>
		<li title="<?php echo $row['remark']; ?>" class="list-group-item">
			<!-- category name -->
			<?php echo $row['name']; ?>

			<!-- delete button -->
			 <a href="cat-del.php?id=<?= $row['id'];?>" class="btn btn-danger btn-sm float-right" onclick="return confirm('Are you sure?')">del</a>

			 <!-- edit button  -->
			 <a href="cat-edit.php?id=<?= $row['id'];?>" class="btn btn-info btn-sm float-right mx-2">edit</a>
		</li>
		<?php endwhile;?>
	</ul>
	<a href="cat-new.php" class="btn btn-success mt-3 m-3">New Category</a>
</div>

<!-- body close tag -->
<?php include '../layouts/footer.php';?>