<?php
require './src/global.php';
$id = $_GET['id'];

$fetch = fetch("SELECT * FROM lapangan WHERE id = '$id'");
$pesan = '';

$total_harga = 0;
$uang_kembalian = 0;

if (isset($_POST['booking'])) {
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
    // $uang_pembayaran = htmlspecialchars($_POST['uang_pembayaran']);

    $checking = mysqli_query($conn, "SELECT * FROM riwayat WHERE tanggal_sewa = '$tanggal_sewa' AND jam_sewa = '$jam_sewa' AND jam_selesai = '$jam_selesai'");

    if (mysqli_num_rows($checking) > 0) {
        $pesan = 'ada yang pesan pada tanggal tersebut';
    } else {
        $total_harga = ($lama_sewa * $fetch[0]['harga']) + ($lama_sewa * ($sepatu + $kostum));
        var_dump($id, $nama, $telp, $tanggal_sewa, $lama_sewa, $total_harga, $jam_sewa, $jam_selesai);

        // $uang_kembalian = $uang_pembayaran - $total_harga;
        $tidak_bayar = true;

        $query = mysqli_query($conn, "INSERT INTO booking VALUES(0, '$id', '$nama', '$telp', CURRENT_TIMESTAMP, '$tanggal_sewa', '$total_harga', '$lama_sewa', '$jam_sewa', '$jam_selesai', '$tidak_bayar')");

        header('location: daftarbayar.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="./src/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/global.css">
</head>

<body>
    <?php include './navbar.php'; ?>
    <h2 class="text-center text-danger"><?= $pesan; ?></h2>
    <form action="" method="post" class="d-flex justify-content-around align-items-center col-md-6 mt-3 mx-auto">
        <div class="">
            <?php foreach ($fetch as $row) : ?>
                <h3>Tipe lapangan: <?= $row['tipe_lapangan']; ?></h3>
                <h3>Jenis lapangan: <?= $row['jenis_lapangan']; ?></h3>
                <h3>Harga lapangan: <?= $row['harga']; ?> (perjam)</h3>
            <?php endforeach ?>
        </div>
        <div class="">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="" class="form-control">
            <label for="telp" class="form-label">Telepon</label>
            <input type="number" name="telp" id="" class="form-control">
            <label for="tanggal_sewa" class="form-label">Tanggal sewa</label>
            <input type="date" name="tanggal_sewa" id="" class="form-control">
            <label for="lama_sewa" class="form-label">Lama sewa (perjam)</label>
            <input type="number" name="lama_sewa" id="" class="form-control">
            <span class="d-block my-2">
                <input type="checkbox" name="sepatu" id="sepatu" class="btn-check" value="50000">
                <label for="sepatu" class="btn btn-outline-primary">Sepatu</label>
                <input type="checkbox" name="kostum" id="kostum" class="btn-check" value="45000">
                <label for="kostum" class="btn btn-outline-secondary">Kostum</label>
            </span>
            <label for="jam_sewa" class="form-label">Jam sewa</label>
            <input type="time" name="jam_sewa" id="" class="form-control">
            <!-- <label for="uang_pembayaran" class="form-label">Uang pembayaran</label>
            <input type="number" name="uang_pembayaran" id="" class="form-control"> -->
            <button type="submit" class="mt-2 btn btn-primary" name="booking">Booking</button>
        </div>
    </form>
    <script src="./src/js/bootstrap.bundle.js"></script>
</body>

</html>