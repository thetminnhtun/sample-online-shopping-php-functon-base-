<?php 
include 'confs/auth.php';
$title = "Order List";include '../layouts/header-admin.php';
?>
<!-- body open tag -->

<div class="col-md-10 offset-md-1 border border-success b-w-3 mt-3 p-0">
	<h1 class="bg-success text-white p-2 font-b font-24 mb-0">Order List</h1>
	<?php 
	include '../layouts/nav-admin.php';
	include "confs/config.php"; 
	?>
	<div class="container">

		<?php  
			$orders = mysqli_query($conn, "SELECT * FROM orders");
			while ($order = mysqli_fetch_assoc($orders)):
		?>
		<div class="row border p-2 m-3">
			
			<!-- person info -->
			<?php if($order['status']==0): ?>
				<div class="col-md-5">
			<?php else: ?>
				<div class="col-md-5 text-muted" id="delivered">
			<?php endif; ?>
				<b class="d-block"><?= $order['name']; ?></b>
				<i class="d-block"><?= $order['email']; ?></i>
				<span class="d-block"><?= $order['phone']; ?></span>
				<p><?= $order['address']; ?></p>

				<?php if($order['status']): ?>
					* <a href="order-status.php?status=0&id=<?= $order['id']; ?>">Undo</a>
				<?php else: ?>
					* <a href="order-status.php?status=1&id=<?= $order['id']; ?>">Mark as Delivered</a>
				<?php endif; ?>

			</div>

			<!-- book info -->
			<div class="col-md-7 border-left">
				<?php 
				$order_id = $order['id'];
				$items = mysqli_query($conn, "SELECT order_items.*,books.title FROM order_items LEFT JOIN
					books ON order_items.book_id = books.id WHERE order_items.order_id = $order_id");
				while($item = mysqli_fetch_assoc($items)): 
				?>
					
				<a href="../book-detail.php?id=<?= $item['book_id']; ?>" class="d-block">
					<?= $item['title']; ?> (<?= $item['qty']; ?>)
				</a>	

				<?php endwhile; ?>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
</div>

<!-- body close tag -->
<?php include '../layouts/footer.php';?>
