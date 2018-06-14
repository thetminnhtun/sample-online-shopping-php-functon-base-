<?php
include 'confs/auth.php';

include 'confs/config.php';

$id  = $_GET['id'];

// delete image file
$img = mysqli_query($conn, "SELECT * FROM books WHERE id = $id");
$row = mysqli_fetch_assoc($img);
unlink("covers/". $row['cover']);

// delete data form database
$sql = "DELETE FROM books WHERE id = $id";
mysqli_query($conn, $sql);
header("location: book-list.php");
