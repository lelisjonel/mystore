<?php

require_once('storeclass.php');
$id = $_GET['id'];
$product = $store->get_single_product($id);
// $total_qty = $store->get_total_qty($id);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Product Detail | <?= $product['product_name'] ?></title>
</head>
<body>
	<h1><?= $product['product_name'];?></h1>
	<h2><?= $product['product_type'];?></h2>
	<h3><?= $product['min_stocks'];?></h3>
	<br>
	<h4>Total : <?= $product['total'] ?></h4>
	<h5><?= print_r($product);?></h5>

	<a href="products.php">Products</a>
	<a href="addnewstocks.php?id=<?= $product['ID']; ?>">Add new Stocks</a>
</body>
</html>