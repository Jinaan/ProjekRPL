<?php
    include '../../../assets/util/koneksi.php';
    $kode_barang = $_POST['kode_barang'];
    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE kode = '$kode_barang'");
    $data = mysqli_fetch_array($query);
    if ($data) {
        echo '1';
    } else {
        echo '0';
    }
?>