<?php
    include '../../../assets/util/koneksi.php';
    $nama_barang = $_POST['nama_barang'];
    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE nama = '$nama_barang'");
    $data = mysqli_fetch_array($query);
    if ($data) {
        echo '1';
    } else {
        echo '0';
    }
?>