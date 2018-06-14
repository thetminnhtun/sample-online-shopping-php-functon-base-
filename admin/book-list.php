<?php 
include 'confs/auth.php';
$title = "Book lists";include '../layouts/header-admin.php';
?>
<!-- body open tag -->

<div class="col-md-10 offset-md-1 border border-success b-w-3 mt-3 p-0">
	<h1 class="bg-success text-white p-2 font-b font-24 mb-0">Book List</h1>
	<?php
	include '../layouts/nav-admin.php';
	include "confs/config.php";

	$result = mysqli_query($conn, "SELECT books.*, categories.name FROM 
		books LEFT JOIN categories ON books.category_id = categories.id 
		ORDER BY books.created_date DESC");
	?>
	<ul class="list-group list-group-flush">
		<?php while ($row = mysqli_fetch_assoc($result)): ?>
		<li class="list-group-item b-t-none">
			<img src="covers/<?= $row['cover'];?>" align="right" height="140" >

			<b class="d-block text-primary"><?= $row['title'];?></b>
			<i class="text-muted">by <?= $row['author'];?></i>
			<small class="text-muted">(in <?= $row['name'];?>)</small>
			<span class="text-success"><?= $row['price'];?> Ks</span>
			<div><?= $row['summary'];?></div>

			<!-- delete button -->
			 <a href="book-del.php?id=<?= $row['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">del</a>

			 <!-- edit button  -->
			 <a href="book-edit.php?id=<?= $row['id'];?>" class="btn btn-info btn-sm mx-2">edit</a>
		</li>
		<?php endwhile;?>
	</ul>
	<a href="book-new.php" class="btn btn-success mt-3 m-3">New Book</a>
</div>

<!-- body close tag -->
<?php include '../layouts/footer.php';?>
