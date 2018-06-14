<?php $title = "View Cart";include 'layouts/header.php'; 

session_start();
if (empty($_SESSION['cart'])) {
	header("location: index.php");
	exit();
}

include 'admin/confs/config.php';

?>

<div class="container border border-success col-md-10 my-3 b-w-3">
	<div class="row p-0 bg-success">
		<a href="index.php" style="text-decoration: none;">
			<h1 class="font-b font-24 m-2 text-white">
				View Cart
			</h1>
		</a>
	</div>


	<div class="row">
		<!-- Sidebar -->
		<div class="col-md-4 bg-sidebar p-1">
			<div class="list-group list-group-flush">
				<a href="index.php" class="list-group-item list-group-item-action text-primary">
					&laquo; Containue Shopping
				</a>
				<a href="clear-cart.php" class="list-group-item list-group-item-action text-danger">
					&times; Clear Cart
				</a>
			</div>
		</div>

		<!-- Content -->
		<div class="col-md-8">
			<!-- order list -->
			<div class="row p-3">
				<div class="">

					<table class="table table-bordered">
						<thead class="table-active">
							<tr>
								<th scope="col">No</th>
								<th scope="col">Book Title</th>
								<th scope="col">Quantity</th>
								<th scope="col">Unit Price</th>
								<th scope="col">Price</th>
							</tr>
						</thead>
						<tbody>
							<?php  
								$total = 0;
								$num = 0;
								foreach($_SESSION['cart'] as $id => $qty):
								$sql = "SELECT title,price FROM books WHERE id = $id";
								$result = mysqli_query($conn,$sql);
								$row = mysqli_fetch_assoc($result);
								$total += $row['price'] * $qty;
								$num ++;
							?>
							<tr>
								<td><?= $num; ?></td>
								<td><?= $row['title'];?></td>
								<td class="text-center"><?= $qty; ?></td>
								<td class="text-right"><?= $row['price'] ?></td>
								<td class="text-right"><?= $row['price'] * $qty ?></td>
							</tr>
							<?php endforeach; ?>
							<tr>
								<td colspan="4" class="text-center font-weight-bold">Total :</td>
								<td> <?=$total ?> Ks</td>
							</tr>
						</tbody>
					</table>

				</div>
			</div>

			<!-- order person -->
			<div class="row">
				<div class="col-12">
					<h3 class="text-danger border-bottom font-24">Order Now</h3>
					<form action="submit-order.php" method="post" class="col-md-6 mb-3">
					<div class="form-group">
						<label for="name">Your Name</label>
						<input type="text" class="form-control" id="name" name="name">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="phone" class="form-control" id="phone" name="phone">
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<textarea class="form-control" id="address" rows="3" name="address"></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
						
					</form>
				</div>
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