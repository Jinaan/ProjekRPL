<!-- nama -->
<?php
    include "koneksi.php";
    $nama = $_POST['NamaKategoriNew'];
    $sql = "INSERT INTO kategori (namaKategori) VALUES ('$nama')";
    if ($koneksi->query($sql) === TRUE) {
        // echo "<script>alert('Kategori berhasil ditambahkan');</script>";
    }
    echo "<script>window.location.href='../../account/kategori.php';</script>";
    // else {
    //     echo "<script>alert('Kategori gagal ditambahkan');</script>";
    // }
    // echo "<script>window.location.href='../../account/kategori.php';</script>";
?>