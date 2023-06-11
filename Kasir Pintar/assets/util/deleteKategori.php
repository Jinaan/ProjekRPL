<?php
    include "koneksi.php";
    // console.log($idKategori);
    $idKategori = array();
    $idKategori = $_POST['idKategori'];
    foreach ($idKategori as $id) {
        // echo "<script>console.log($id);</script>";
        $sql = "DELETE FROM kategori WHERE idKategori = '$id'";
        if ($koneksi->query($sql) === TRUE) {
        }
    }
    // echo "<script>window.location.href='../../account/kategori.php';</script>";
?>