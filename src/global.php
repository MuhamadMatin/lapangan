<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'matin_lapangan');
    
    function fetch($query){
        global $conn;
        $datas = [];
        $fetch = mysqli_query($conn, $query);
        while ($data = mysqli_fetch_assoc($fetch)) {
            $datas[] = $data;
        }
        return $datas;
    }
?>