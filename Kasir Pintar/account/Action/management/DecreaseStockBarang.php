<?php
    include '../../../assets/util/koneksi.php';
    $id = $_POST['idBarang'];
    $jumlahKurang = $_POST['jumlah'];
    $tanggalSekarang = date("Y-m-d");
    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE idBarang = '$id'");
    $data = mysqli_fetch_array($query);
    $stokSekarang = $data['stok'];
    $stokBaru = $stokSekarang - $jumlahKurang;
    $hargaSekarang = $data['hargaBeli'];
    $query = mysqli_query($koneksi, "INSERT INTO riwayatubah (idBarang, tanggalUbah, jumlah, HargaUbah) VALUES ('$id', '$tanggalSekarang', '$stokBaru', '$hargaSekarang')");
    // update stock and hargaBeli on barang
    $query = mysqli_query($koneksi, "UPDATE barang SET stok = '$stokBaru', hargaBeli = '$hargaSekarang' WHERE idBarang = '$id'");
    if ($query) {
        echo "True";
    } else {
        echo "false";
    }
?>