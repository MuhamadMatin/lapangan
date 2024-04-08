<?php
require './src/global.php';
$fetch = fetch("SELECT * FROM booking");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <link rel="stylesheet" href="./src/css/bootstrap.min.css">
  <link rel="stylesheet" href="./src/global.css">
</head>

<body>
  <?php include './navbar.php'; ?>
  <table class="text-center mx-auto">
    <?php if (empty($fetch)) : ?>
      <tr>
        <td colspan="4">Tidak ada data daftar bayar</td>
      </tr>
    <?php else : ?>
      <thead>
        <tr>
          <td>Nama</td>
          <td>Telepon</td>
          <td>Total harga</td>
          <td>aksi</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($fetch as $row) : ?>
          <tr>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['telepon'] ?></td>
            <td><?= $row['total_harga'] ?></td>
            <td>
              <a class="btn btn-primary" href="bayar.php?id=<?= $row['id']; ?>">Bayar</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    <?php endif; ?>
  </table>
  <script src="./src/js/bootstrap.bundle.js"></script>
</body>

</html>