<?php
    include '../../assets/util/koneksi.php';
    $nama = $_POST['nama'];
    $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE namaKategori = '$nama'");
    $data = mysqli_fetch_array($query);
    if ($data) {
        echo 'double';
    } else {
        echo 'not double';
    }
?>