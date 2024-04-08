<?php
require './src/global.php';

$fetch = fetch("SELECT * FROM riwayat");


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar booking</title>
  <link rel="stylesheet" href="./src/css/bootstrap.min.css">
  <link rel="stylesheet" href="./src/global.css">
</head>

<body>
  <?php include './navbar.php'; ?>
  <table class="text-center mx-auto">
    <?php if (empty($fetch)) : ?>
      <tr>
        <td colspan="4">Tidak ada data daftar booking</td>
      </tr>
    <?php else : ?>
      <thead>
        <tr>
          <td>Nama</td>
          <td>Telepon</td>
          <td>Tanggal transaksi</td>
          <td>Tanggal sewa</td>
          <td>Total harga</td>
          <td>Jam sewa</td>
          <td>Jam selesai</td>
          <td>Aksi</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($fetch as $row) : ?>
          <tr>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['telepon']; ?></td>
            <td><?= $row['tanggal_transaksi']; ?></td>
            <td><?= $row['tanggal_sewa']; ?></td>
            <td><?= $row['total_harga']; ?></td>
            <td><?= $row['jam_sewa']; ?></td>
            <td><?= $row['jam_selesai']; ?></td>
            <td>
              <a class="btn btn-danger" href="hapusbooking.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus booking?');">Hapus</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    <?php endif ?>
  </table>
  <script src="./src/js/bootstrap.bundle.js"></script>
</body>

</html>