<?php
include 'confs/auth.php';

$title = "Edit Book";include '../layouts/header-admin.php';

include 'confs/config.php';
$id  = $_GET['id'];
$sql = "SELECT * FROM books WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>
<!-- body open tag -->


<div class="col-md-10 offset-md-1 border border-success b-w-3 mt-3 p-0">
	<h1 class="bg-success text-white p-2 font-b font-24">Edit Book</h1>
	<form action="book-update.php" method="post" enctype="multipart/form-data" class="m-3">
		<input type="hidden" name="id" value="<?= $row['id']; ?>">
		<div class="form-group">
			<label for="title">Book Title</label>
			<input type="text" class="form-control" id="title" name="title" value="<?= $row['title']?>">
		</div>
		<div class="form-group">
			<label for="author">Author</label>
			<input type="text" class="form-control" id="author" name="author" value="<?= $row['author']?>">
		</div>
		<div class="form-group">
			<label for="summary">Summary</label>
			<textarea class="form-control" id="summary" rows="3" name="summary"><?= $row['summary']?>"</textarea>
		</div>
		<div class="form-group">
			<label for="price">Price</label>
			<input type="text" class="form-control" id="price" name="price" value="<?= $row['price']?>">
		</div>
		<div class="form-group">
			<label for="categories">Category</label>
			<select class="form-control" id="categories" name="category_id">
				<option value="0">-- Choose --</option>
				<?php

				include 'confs/config.php';
				$cats = mysqli_query($conn, "SELECT * FROM categories");
				while ($cat = mysqli_fetch_assoc($cats)):

				?>
				<option value="<?=$cat['id'];?>"
					<?php if($cat['id'] == $row['category_id']) echo "selected"; ?>
					>
					<?=$cat['name'];?>
				</option>
				<?php endwhile;?>
			</select>
		</div>
		<div class="form-group">
			<img src="covers/<?= $row['cover']; ?>" alt="Image" height="150">
		</div>
		<div class="form-group mb-4">
			<label for="cover">Cover</label>
			<input type="file" class="form-control-file" id="cover" name="cover">
		</div>
		<a href="book-list.php" class="btn btn-light float-right">Back</a>
		<button type="submit" class="btn btn-success">Update Book</button>
	</form>
</div>

<!-- body close tag -->
<?php include '../layouts/footer.php';?>