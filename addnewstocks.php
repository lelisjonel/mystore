<?php
require_once('storeclass.php');
$id = $_GET['id'];
$product = $store->get_single_product($id);
$userdetails = $store->get_user_data();

$store->add_stocks($_POST);
if (isset($userdetails)) {
	if($userdetails['access'] != 'administrator')
	{
		header("Location: login.php"); 
	}
} else {
	header("Location: login.php");
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Add new stocks</title>
</head>
<body>
	<form method="POST">
		<label>Brand Name</label>
		<input type="text" name="brand_name" id="brand_name" require>
		<label>Qty</label>
		<input type="number" name="qty" id="qty" min="1" value="1">
		<label>Batch Number</label>
		<input type="text" name="batch_number" id="batch">
		<input type="hidden" name="product_id" value="<?= $product['ID']; ?>">
		<input type="hidden" name="added_by" value="<?= $userdetails['fullname']; ?>">

		<button type="submit" name="add_stock">Add Stock</button>
	</form>

</body>
</html>