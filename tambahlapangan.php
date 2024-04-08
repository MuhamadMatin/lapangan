<?php
require './src/global.php';
if (isset($_POST['tambah'])) {
    $tipe = htmlspecialchars($_POST['tipe']);
    $jenis = htmlspecialchars($_POST['jenis']);
    $harga = htmlspecialchars($_POST['harga']);
    $insert = mysqli_query($conn, "INSERT INTO lapangan VALUES(0, '$tipe', '$jenis', '$harga')");
    header('location: lapangan.php');
    // if (mysqli_num_rows($insert) > 0) {
    //     echo 'berhasil tambah lapangan';
    // } else {
    //     echo 'gagal tambah lapangan';
    // }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah lapangan</title>
    <link rel="stylesheet" href="./src/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/global.css">
</head>

<body>
    <?php include './navbar.php'; ?>
    <h1 class="text-center">Tambah lapangan</h1>
    <form action="" method="post" class="col-md-4 mx-auto">
        <label for="tipe" class="form-label">Tipe lapangan</label>
        <input type="text" name="tipe" id="" class="form-control" required>
        <label for="jenis" class="form-label">Jenis lapangan</label>
        <input type="text" name="jenis" id="" class="form-control" required>
        <label for="harga" class="form-label">Harga Harga</label>
        <input type="number" name="harga" id="" class="form-control" required>
        <button type="submit" class="mt-3 btn btn-primary" name="tambah">Tambah</button>
    </form>
    <script src="./src/js/bootstrap.bundle.js"></script>
</body>

</html>