<?php
require './src/global.php';
$id = $_GET['id'];
$fetch = fetch("SELECT * FROM booking WHERE id = '$id'");
$id_lapangan = $fetch[0]['id_lapangan'];
$fetch_lapangan = fetch("SELECT * FROM lapangan WHERE id = '$id_lapangan'");

$total_harga = $fetch[0]['total_harga'];
$uang_kembalian = 0;

$nama = $fetch[0]['nama'];
$telp = $fetch[0]['telepon'];
$tanggal_sewa = $fetch[0]['tanggal_sewa'];
$lama_sewa = $fetch[0]['lama_sewa'];
$jam_sewa = $fetch[0]['jam_sewa'];
$jam_selesai = $fetch[0]['jam_selesai'];
if (isset($_POST['bayar'])) {
    $uang_pembayaran = htmlspecialchars($_POST['uang_pembayaran']);
    $uang_kembalian = $uang_pembayaran - $total_harga;

    $query = mysqli_query($conn, "INSERT INTO riwayat VALUES(0, '$id_lapangan', '$nama', '$telp', CURRENT_TIMESTAMP, '$tanggal_sewa', '$total_harga', '$lama_sewa', '$jam_sewa', '$jam_selesai')");
    $delete = mysqli_query($conn, "DELETE FROM booking WHERE id = '$id'");
}
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
    <form action="" method="post" class="d-flex justify-content-around align-items-center col-md-6 mt-3 mx-auto">
        <div class="">
            <?php foreach ($fetch_lapangan as $row) : ?>
                <h3>Tipe lapangan: <?= $row['tipe_lapangan']; ?></h3>
                <h3>Jenis lapangan: <?= $row['jenis_lapangan']; ?></h3>
                <h3>Harga lapangan: <?= $row['harga']; ?> (perjam)</h3>
            <?php endforeach ?>
            <h3>Total harga: <?= $total_harga; ?></h3>
            <h3>Uang kembalian: <?= $uang_kembalian; ?></h3>
        </div>
        <div class="">
            <?php foreach ($fetch as $row) : ?>
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="" class="form-control" value="<?= $row['nama'] ?>" disabled>
                <label for="telp" class="form-label">Telepon</label>
                <input type="number" name="telp" id="" class="form-control" value="<?= $row['telepon'] ?>" disabled>
                <label for="tanggal_sewa" class="form-label">Tanggal sewa</label>
                <input type="date" name="tanggal_sewa" id="" class="form-control" value="<?= $row['tanggal_sewa'] ?>" disabled>
                <label for="lama_sewa" class="form-label">Lama sewa (perjam)</label>
                <input type="number" name="lama_sewa" id="" class="form-control" value="<?= $row['lama_sewa']; ?>" disabled>
                <label for="jam_sewa" class="form-label">Jam sewa</label>
                <input type="time" name="jam_sewa" id="" class="form-control" value="<?= $row['jam_sewa'] ?>" disabled>
                <label for="jam_selesai" class="form-label">Jam sewa</label>
                <input type="time" name="jam_selesai" id="" class="form-control" value="<?= $row['jam_selesai'] ?>" disabled>
            <?php endforeach ?>
            <label for="uang_pembayaran" class="form-label">Uang pembayaran</label>
            <input type="number" name="uang_pembayaran" id="" class="form-control">
            <button type="submit" class="mt-2 btn btn-primary" name="bayar">Bayar</button>
        </div>
    </form>
    <script src="./src/js/bootstrap.bundle.js"></script>
</body>

</html>