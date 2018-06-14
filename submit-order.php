<?php $title = "Order Submitted";include 'layouts/header.php';

include 'admin/confs/config.php';
session_start();

$name  = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$sql = "INSERT INTO orders (name,email,phone,address,status,created_date,modified_date) 
		VALUES ('$name','$email','$phone','$address',0,now(),now())";
mysqli_query($conn, $sql);

$order_id = mysqli_insert_id($conn);

foreach ($_SESSION['cart'] as $id => $qty) {

	mysqli_query($conn, "INSERT INTO order_items (book_id, order_id, qty) 
		VALUES ('$id','$order_id', '$qty')");
}

unset($_SESSION['cart']);

?>




<div class="container border border-success col-md-10 my-3 b-w-3">
	<div class="row p-0 bg-success">
		<a href="index.php" style="text-decoration: none;">
			<h1 class="font-b font-24 m-2 text-white">
			Order Submitted
			</h1>
		</a>
	</div>

	<div class="row justify-content-center my-5">
		<div class="alert alert-success" role="alert">
			Your order have been submitted. We'll deliver the items soon.
			<a href="index.php" class="alert-link font-weight-normal">Book Store Home.</a>
		</div>
	</div>

	<div class="row">
		<div class="col-12 bg-footer text-center py-1">
			&copy;<?= date('Y'); ?> All right reserved."
		</div>
	</div>
</div>
<?php include 'layouts/footer.php';?>
