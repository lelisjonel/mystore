<?php

require_once('storeclass.php');

$store->add_user();
$userdetails = $store->get_user_data();

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
	<title>Add New User</title>
</head>
<body>
	<h2>Add new customer/user</h2>

	<div class="container">
		<div class="form-container">
			<form action="" method="POST">
				<div class="form-input">
					<label>Email</label>
					<input type="email" name="email" id="email" autocomplete="off">
				</div>

				<div class="form-input">
					<label>Password</label>
					<input type="password" name="password" id="password">
				</div>

				<div class="form-input">
					<label>First Name</label>
					<input type="text" name="fname" id="fname">
				</div>

				<div class="form-input">
					<label>Last Name</label>
					<input type="text" name="lname" id="lname">
				</div>

				<button type="submit" name="add">Add user</button>
			</form>
		</div>
	</div>

</body>
</html>