<?php $title = "Book Detail";include 'layouts/header.php';
include 'admin/confs/config.php';
$id = $_GET['id'];
$book = mysqli_query($conn, "SELECT * FROM books WHERE id = $id");
$row = mysqli_fetch_assoc($book);
?>
<div class="container border border-success col-md-10 my-3 b-w-3">
	<!-- start title -->
	<div class="row p-0 bg-success">
		<a href="index.php" style="text-decoration: none;">
			<h1 class="font-b font-24 m-2 text-white">
				Book Store
			</h1>
		</a>
	</div>
	<!-- end title -->
	
	<!-- start Content -->
	<div class="row p-2">
		<div class="card col-md-10 offset-md-1 pt-2">
		  	<img src="admin/covers/<?= $row['cover']; ?>" style="height: 200px;width: 150px;">
		  <div class="card-body">
		    <h3 class="card-title"><?= $row['title']; ?></h3>
		    <i>by <?= $row['author'];?>,</i>
		    <b><?= $row['price']; ?> Ks</b>
		 	<p class="mt-2 text-justify"><?= $row['summary']; ?></p>
		 	<a href="add-to-cart.php?id=<?=$row['id'];?>" class="card-link btn btn-success">Add to Cart</a>
    		<a href="index.php" class="card-link float-right btn btn-outline-secondary">&laquo; Go Back</a>
		  </div>
		</div>
		
	</div>
	<!-- end content -->

	<!-- start footer -->
	<div class="row">
		<div class="col-12 bg-footer text-center py-1">
			<?php 
				echo "&copy;".date('Y')." All right reserved.";
			?>
		</div>
	</div>
	<!-- end footer -->
</div>
<?php include 'layouts/footer.php';?>
