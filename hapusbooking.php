<?php
require './src/global.php';
$id = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM riwayat WHERE id = '$id'");

header('location: daftarbooking.php');
