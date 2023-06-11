<?php
    include '../../../assets/util/koneksi.php';
    $nama_barang = $_POST['nama_barang'];
    $kode_barang = $_POST['kode_barang'];
    $add_kategori = $_POST['add_kategori'];
    $harga_beli_input = $_POST['harga_beli_input'];
    $harga_jual_input = $_POST['harga_jual_input'];
    $add_stok = $_POST['add_stok'];
    $IDberat_dan_satuan = $_POST['IDberat_dan_satuan'];
    $ketBarang = $_POST['ketBarang'];
    $getNamaKategori = mysqli_query($koneksi, "SELECT namaKategori FROM kategori WHERE idKategori = '$add_kategori'");

    $namaKategori = mysqli_fetch_array($getNamaKategori)[0];
    // echo "<console.log>$ketBarang</console.log>";
    $insert = mysqli_query($koneksi, "INSERT INTO barang (nama, kode, kategori, hargaBeli, hargaJual, stok, satuan, keterangan, idKategori) VALUES ('$nama_barang', '$kode_barang', '$namaKategori', '$harga_beli_input', '$harga_jual_input', '$add_stok', '$IDberat_dan_satuan', '$ketBarang', '$add_kategori')");


    $idBarang = mysqli_fetch_array(mysqli_query($koneksi, "SELECT idBarang FROM barang WHERE nama = '$nama_barang' AND kode = '$kode_barang'" ))[0];
    $tanggalUbah = date("Y-m-d");
    $query = mysqli_query($koneksi, "INSERT INTO riwayatubah (idBarang, tanggalUbah, jumlah, HargaUbah) VALUES ('$idBarang', '$tanggalUbah', '$add_stok', '$harga_beli_input')");
?>