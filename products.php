
<?php
require_once('storeclass.php');
$products = $store->get_products();


?>


<!DOCTYPE html>
<html>
<head>
	<title>Product List</title>
</head>
<body>

	<ul>
		<?php foreach($products as $product) { ?>
		<li><a href="product_details.php?id=<?= $product['ID'];?>"><?= $product['product_name'];?> | <?= $product['min_stocks'];?></a></li>
		<?php } ?>
	</ul>

</body>
</html>