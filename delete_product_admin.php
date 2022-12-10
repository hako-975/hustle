<?php 
	require_once 'connection.php';

	$product_id = $_GET['product_id'];
	$product_name = $_GET['product_name'];

	$sql = mysqli_query($conn, "DELETE FROM product WHERE product_id = '$product_id'");

	if ($sql) {
        echo "<script>
        alert('Product ".$product_name." deleted!');
        document.location.href='product_admin.php'
        </script>";
    } else {
        echo "<script>
        alert('Product ".$product_name." failed to delete!');
        document.location.href='product_admin.php'
        </script>";
    }