<!-- nama -->
<?php
    include "koneksi.php";
    $nama = $_POST['EditTextField'];
    $id = $_POST['id'];
    $sql = "UPDATE kategori SET namaKategori = '$nama' WHERE idKategori = '$id'";
    if ($koneksi->query($sql) === TRUE) {
    }
        echo "<script>window.location.href='../../account/kategori.php';</script>";
?>