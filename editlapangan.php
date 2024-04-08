<?php
    require './src/global.php';
    $id = $_GET['id'];

    $fetch = fetch("SELECT * FROM lapangan WHERE id = '$id'");

    if (isset($_POST['edit'])) {
        $jenis_lapangan = $_POST['jenis_lapangan'];
        $tipe_lapangan = $_POST['tipe_lapangan'];
        $harga = $_POST['harga'];

        $query = mysqli_query($conn, "UPDATE lapangan SET jenis_lapangan = '$jenis_lapangan', tipe_lapangan = '$tipe_lapangan', harga = '$harga' WHERE id = '$id'");
        header('location: lapangan.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit lapangan</title>
    <link rel="stylesheet" href="./src/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/global.css">
</head>
<body>
    <?php include './navbar.php'; ?>
    <h1 class="text-center">Edit lapangan</h1>
    <form action="" method="post" class="col-md-4 mx-auto">
        <?php foreach($fetch as $row) : ?>
            <label for="jenis_lapangan" class="form-label">Jenis lapangan</label>
            <input type="text" name="jenis_lapangan" id="" class="form-control" value="<?= $row['jenis_lapangan']; ?>">
            <label for="tipe_lapangan" class="form-label">Tipe lapangan</label>
            <input type="text" name="tipe_lapangan" id="" class="form-control" value="<?= $row['tipe_lapangan']; ?>">
            <label for="harga" class="form-label">Harga lapangan</label>
            <input type="number" name="harga" id="" class="form-control" value="<?= $row['harga']; ?>">
            <button type="submit" name="edit" class="mt-2 btn btn-primary">Edit</button>
        <?php endforeach ?>
    </form>
    <script src="./src/js/bootstrap.bundle.js"></script>
</body>
</html>