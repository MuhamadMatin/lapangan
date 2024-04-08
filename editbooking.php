<?php
require './src/global.php';
$id = $_GET['id'];

$fetch = fetch("SELECT * FROM riwayat WHERE id = '$id'");
$id_lapangan = $fetch[0]['id_lapangan'];
$fetch_lapangan = fetch("SELECT * FROM lapangan WHERE id = '$id_lapangan'");

$total_harga = $fetch[0]['total_harga'];
$total_harga_sekarang = 0;
$uang_pembayaran = 0;
$uang_kembalian = 0;

if (isset($_POST['edit'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $telp = htmlspecialchars($_POST['telp']);
    $tanggal_sewa = htmlspecialchars($_POST['tanggal_sewa']);
    $lama_sewa = htmlspecialchars($_POST['lama_sewa']);
    if (isset($_POST['sepatu'])) {
        $sepatu = htmlspecialchars($_POST['sepatu']);
    } else {
        $sepatu = 0;
    }
    if (isset($_POST['kostum'])) {
        $kostum = htmlspecialchars($_POST['kostum']);
    } else {
        $kostum = 0;
    }
    $jam_sewa = htmlspecialchars($_POST['jam_sewa']);
    $jam_mulai_format = strtotime($jam_sewa) + ($lama_sewa * 60 * 60);
    $jam_selesai = date("H:i", $jam_mulai_format);
    $uang_pembayaran = intval(htmlspecialchars($_POST['uang_pembayaran']));
    var_dump($id, $nama, $telp, $tanggal_sewa, $lama_sewa, $total_harga, $jam_sewa, $jam_selesai);

    $total_harga = ($lama_sewa * $fetch_lapangan[0]['harga']) + ($lama_sewa * ($sepatu + $kostum));
    $uang_kembalian = $uang_pembayaran - $total_harga;

    // $query = mysqli_query($conn, "INSERT INTO riwayat VALUES(0, '$id', '$nama', '$telp', CURRENT_TIMESTAMP, '$tanggal_sewa', '$total_harga', '$lama_sewa', '$jam_sewa', '$jam_selesai')");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit booking</title>
    <link rel="stylesheet" href="./src/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/global.css">
</head>

<body>
    <?php include './navbar.php'; ?>
    <div class="d-flex justify-content-around align-items-center col-md-6 mt-3 mx-auto">
        <div class="">
            <?php foreach ($fetch_lapangan as $row) : ?>
                <h3>Tipe lapangan: <?= $row['tipe_lapangan']; ?></h3>
                <h3>Jenis lapangan: <?= $row['jenis_lapangan']; ?></h3>
                <h3>Harga: <?= $row['harga']; ?> (perjam)</h3>
            <?php endforeach ?>
            <h3>Total harga lalu: <?= $total_harga; ?></h3>
            <h3>Total harga sekarang: <?= $total_harga_sekarang; ?></h3>
            <h3>Uang kembalian: <?= $uang_kembalian ?></h3>
        </div>

        <form action="" method="post" class="">
            <?php foreach ($fetch as $row) : ?>
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="" class="form-control" value="<?= $row['nama']; ?>">
                <label for="telp" class="form-label">Telepon</label>
                <input type="number" name="telp" id="" class="form-control" value="<?= $row['telepon']; ?>">
                <label for="tanggal_sewa" class="form-label">Tanggal sewa</label>
                <input type="date" name="tanggal_sewa" id="" class="form-control" value="<?= $row['tanggal_sewa']; ?>">
                <label for="lama_sewa" class="form-label">Lama sewa</label>
                <input type="number" name="lama_sewa" id="" class="form-control" value="<?= $row['lama_sewa']; ?>">
                <span class="d-block my-2">
                    <input type="checkbox" name="sepatu" id="sepatu" class="btn-check" value="50000">
                    <label for="sepatu" class="btn btn-outline-primary">Sepatu</label>
                    <input type="checkbox" name="kostum" id="kostum" class="btn-check" value="45000">
                    <label for="kostum" class="btn btn-outline-secondary">Kostum</label>
                </span>
                <label for="jam_sewa" class="form-label">Jam sewa</label>
                <input type="time" name="jam_sewa" id="" class="form-control" value="<?= $row['jam_sewa']; ?>">
                <label for="jam_selesai" class="form-label">Jam selesai</label>
                <input type="time" name="jam_selesai" id="" class="form-control" value="<?= $row['jam_selesai']; ?>" disabled>
                <label for="uang_pembayaran" class="form-label">Uang pembayaran</label>
                <input type="number" name="uang_pembayaran" id="" class="form-control">
            <?php endforeach ?>
            <button type="submit" class="mt-2 btn btn-primary" name="edit">Edit</button>
        </form>
    </div>
    <script src="./src/js/bootstrap.bundle.js"></script>
</body>

</html>