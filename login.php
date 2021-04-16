<?php

require_once('storeclass.php');
$store->login();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
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
				<button type="submit" name="submit">Login</button>
			</form>
		</div>
	</div>

</body>
</html>