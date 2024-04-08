<?php
require './src/global.php';
if (isset($_POST['register'])) {
    $username = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars(md5($_POST['pass']));
    $insert = mysqli_query($conn, "INSERT INTO account VALUES(0, '$username', '$pass')");
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./src/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/global.css">
</head>

<body>
    <h1 class="text-center">Register</h1>
    <form class="col-md-6 mx-auto" action="" method="post">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="" class="form-control" required>
        <label for="pass" class="form-label">Password</label>
        <input type="password" name="pass" id="" class="form-control" required>
        <button type="submit" name="register" class="mt-2 btn btn-primary">Register</button>
    </form>
    <script src="./src/js/bootstrap.bundle.js"></script>
</body>

</html>