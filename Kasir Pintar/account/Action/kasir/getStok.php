<?php
    include '../../../assets/util/koneksi.php';
    $dataJson = file_get_contents('php://input');
    $data = json_decode($dataJson, true);
    $kode = $data['kode'];

    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE kode = '$kode'");
    $data = mysqli_fetch_array($query);
    $stok = $data['stok'];
    echo $stok;
?>