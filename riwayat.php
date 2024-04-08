<?php
require './src/global.php';

$fetch = fetch("SELECT * FROM riwayat");

if (isset($_POST['cari'])) {
  $tanggal = $_POST['tanggal'];
  $fetch = fetch("SELECT * FROM riwayat WHERE tanggal_sewa = '$tanggal'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat</title>
  <link rel="stylesheet" href="./src/css/bootstrap.min.css">
  <link rel="stylesheet" href="./src/global.css">
</head>

<body>
  <?php include './navbar.php'; ?>
  <form action="" method="post" class="col-md-4 mt-3 mx-auto">
    <label for="tanggal" class="form-label">Cari berdasarkan taggal</label>
    <input type="date" name="tanggal" id="" class="form-control" required>
    <button type="submit" name="cari" class="mt-3 btn btn-primary">Cari</button>
  </form>
  <table class="text-center mx-auto">
    <?php if (empty($fetch)) : ?>
      <tr>
        <td colspan="4">Tidak ada data riwayat</td>
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
          </tr>
        <?php endforeach ?>
      </tbody>
    <?php endif ?>
  </table>
  <script src="./src/js/bootstrap.bundle.js"></script>
</body>

</html>