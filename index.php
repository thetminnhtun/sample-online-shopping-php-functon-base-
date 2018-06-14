<?php $title = "Home";include 'layouts/header.php';
include 'admin/confs/config.php';
session_start();
$cart = 0;

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $qty) {
        $cart += $qty;      
    }
}

if (isset($_GET['cat'])) {
    $cat_id = $_GET['cat'];
    $book   = mysqli_query($conn, "SELECT * FROM books WHERE category_id = $cat_id");
} else {
    $book = mysqli_query($conn, "SELECT * FROM books");
}

$cat = mysqli_query($conn, "SELECT * FROM categories");

?>
<div class="container border border-success col-md-10 my-3 b-w-3">
	<div class="row p-0 bg-success">
		<a href="index.php" style="text-decoration: none;">
			<h1 class="font-b font-24 m-2 text-white">
				Book Store
			</h1>
		</a>
	</div>

	<div class="row p-0 bg-info justify-content-end">
		<a href="view-cart.php" class="btn btn-link text-white">
			(<?=$cart?>) book in your cart
		</a>
	</div>
	<div class="row">
		<!-- Sidebar -->
		<div class="col-md-4 bg-sidebar p-1">
			<div class="list-group list-group-flush">
				<a href="index.php" class="list-group-item list-group-item-action list-group-item-secondary">
					<b>All Books</b>
				</a>
				<?php while ($row = mysqli_fetch_assoc($cat)): ?>
				<a href="?cat=<?=$row['id'];?>" class="list-group-item list-group-item-action ">
					<?=$row['name'];?>
				</a>
				<?php endwhile;?>
			</div>
		</div>

		<!-- Content -->
		<div class="col-md-8">
			<div class="row ">
				<?php while ($row = mysqli_fetch_assoc($book)): ?>

					<div class="card text-center col-md-4">
					  <div class="card-body">
					  	<img src="admin/covers/<?=$row['cover'];?>" align="center" height="140" width="120">
					  	<h3 class="card-title">
							<a href="book-detail.php?id=<?=$row['id'];?>">
								<?=$row['title'];?>
							</a>
					  	</h3>
					  	<p class="card-text font-italic text-danger"><?=$row['price'];?> Ks</p>
						<a href="add-to-cart.php?id=<?=$row['id'];?>" class="btn btn-success">	Add to Cart
						</a>
					  </div>
					</div>


				<?php endwhile;?>
			</div>
		</div>


	</div>
	<div class="row">
		<div class="col-12 bg-footer text-center py-1">
			<?php 
				echo "&copy;".date('Y')." All right reserved.";
			?>
		</div>
	</div>
</div>
<?php include 'layouts/footer.php';?>