<?php 
include 'confs/auth.php';
$title = "New Book";include '../layouts/header-admin.php';
?>
<!-- body open tag -->

<div class="col-md-10 offset-md-1 border border-success b-w-3 mt-3 p-0">
	<h1 class="bg-success text-white p-2 font-b font-24">New Book</h1>
	<form action="book-add.php" method="post" enctype="multipart/form-data" class="m-3">
		<div class="form-group">
			<label for="title">Book Title</label>
			<input type="text" class="form-control" id="title" name="title">
		</div>
		<div class="form-group">
			<label for="author">Author</label>
			<input type="text" class="form-control" id="author" name="author">
		</div>
		<div class="form-group">
			<label for="summary">Summary</label>
			<textarea class="form-control" id="summary" rows="3" name="summary"></textarea>
		</div>
		<div class="form-group">
			<label for="price">Price</label>
			<input type="text" class="form-control" id="price" name="price">
		</div>
		<div class="form-group">
			<label for="categories">Category</label>
			<select class="form-control" id="categories" name="category_id">
				<option value="0">-- Choose --</option>
				<?php
					include 'confs/config.php';
					$result = mysqli_query($conn, "SELECT * FROM categories");
					while ($row = mysqli_fetch_assoc($result)):
				?>
				<option value="<?=$row['id'];?>">
					<?=$row['name'];?>
				</option>
				<?php endwhile;?>
			</select>
		</div>
		<div class="form-group mb-4">
			<label for="cover">Cover</label>
			<input type="file" class="form-control-file" id="cover" name="cover">
		</div>
		<a href="book-list.php" class="btn btn-light float-right">Back</a>
		<button type="submit" class="btn btn-success">Add Book</button>
	</form>
</div>

<!-- body close tag -->
<?php include '../layouts/footer.php';?>