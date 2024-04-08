<?php
session_start();
require './src/global.php';
$pesan = '';
if (isset($_POST['login'])) {
	$username = htmlspecialchars($_POST['username']);
	$pass = htmlspecialchars(md5($_POST['pass']));
	$query = mysqli_query($conn, "SELECT * FROM account WHERE username = '$username' AND password = '$pass'");
	if (mysqli_num_rows($query) > 0) {
		$_SESSION['login'] = true;
		header('location: index.php');
	} else {
		$pesan = 'username atau password salah';
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="./src/css/bootstrap.min.css">
	<link rel="stylesheet" href="./src/global.css">
</head>

<body>
	<h1 class="text-center">Login</h1>
	<p class="text-center"><?= $pesan; ?></p>
	<form class="col-md-6 mx-auto" action="" method="post">
		<label for="username" class="form-label">Username</label>
		<input type="text" name="username" id="" class="form-control" required>
		<label for="pass" class="form-label">Password</label>
		<input type="password" name="pass" id="" class="form-control" required>
		<button type="submit" name="login" class="mt-2 btn btn-primary">Login</button>
	</form>
	<script src="./src/js/bootstrap.bundle.js"></script>
</body>

</html>