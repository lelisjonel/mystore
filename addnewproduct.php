
<?php

require_once('storeclass.php');
$store->add_product($_POST);


?>


<!DOCTYPE html>
<html>
<head>
	<title>Add new Product</title>
</head>
<body>

	<form method="POST">
		<label>Product Name</label>
		<input type="text" name="product_name" id="product_name">
		<label>Product Type</label>
		<select name="product_type" id="product_type">
			<option value="">---</option>
			<option value="Food">Food</option>
			<option value="Clothing">Clothing</option>
			<option value="Tools">Tools</option>
		</select>
		<label>Minimum Stocks</label>
		<input type="number" name="min_stock" id="min_stock" min="1" value="1">
		<button type="submit" name="add_product">Add Product</button>
	</form>

</body>
</html>