<?php

$id = $_GET['id'];
$status = $_GET['status'];

include 'confs/config.php';

mysqli_query($conn, "UPDATE orders SET status=$status, modified_date=now() WHERE id=$id");

header("location: orders.php");