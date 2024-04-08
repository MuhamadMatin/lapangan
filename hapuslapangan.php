<?php
    require './src/global.php';
    $id = $_GET['id'];
    $query = mysqli_query($conn, "DELETE FROM lapangan WHERE id = '$id'");

    header('location: lapangan.php');
?>