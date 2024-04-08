<?php
require './src/global.php';

$query = fetch("SELECT * FROM lapangan");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapangan</title>
    <link rel="stylesheet" href="./src/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/global.css">
</head>

<body>
    <?php include './navbar.php'; ?>
    <h1 class="text-center">lapangan</h1>
    <span class="d-grid mx-auto col-2">
        <a href="tambahlapangan.php" class="w-fit btn btn-primary">Tambah lapangan</a>
    </span>
    <table class="mx-auto text-center">
        <thead>
            <tr>
                <td>Jenis lapangan</td>
                <td>Tipe lapangan</td>
                <td>Harga</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $row) : ?>
                <tr>
                    <td><?= $row['tipe_lapangan']; ?></td>
                    <td><?= $row['jenis_lapangan']; ?></td>
                    <td><?= $row['harga']; ?></td>
                    <td>
                        <a class="btn btn-primary" href="booking.php?id=<?= $row['id']; ?>">Booking</a>
                        <a class="btn btn-secondary" href="editlapangan.php?id=<?= $row['id']; ?>">Edit</a>
                        <a class="btn btn-danger" href="hapuslapangan.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus lapangan?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>