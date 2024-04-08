<?php
session_start();
if ($_SESSION['login'] == false) {
    header('location: login.php');
}


?>
<main class="bg-dark py-2 d-flex justify-content-around align-items-center">
    <h1 class="text-white">Bola berjalan</h1>
    <span class="d-flex gap-5">
        <a class="text-white" href="index.php">Home</a>
        <!-- <a class="text-white" href="tambahlapangan.php">Tambah lapangan</a> -->
        <a class="text-white" href="lapangan.php">Lapangan</a>
        <a class="text-white" href="daftarbayar.php">Daftar bayar</a>
        <a class="text-white" href="daftarbooking.php">Daftar booking</a>
        <a class="text-white" href="riwayat.php">Riwayat</a>
        <a class="text-white" href="logout.php" onclick="return confirm('yakin logout?')">Logout</a>
    </span>
</main>