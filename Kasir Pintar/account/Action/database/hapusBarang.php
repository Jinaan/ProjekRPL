<?php
    include '../../../assets/util/koneksi.php';
// array idBarang
    $idBarang = array();
    $idBarang = $_POST['idBarang'];
    // foreach ($idBarang as $id) {
    //     echo "<script>console.log($id);</script>";
    // }
    foreach ($idBarang as $id) {
        $sql = "DELETE FROM barang WHERE idBarang = '$id'";
        if ($koneksi->query($sql) === TRUE) {
            // echo "<script>console.log('berhasil + $id');</script>";
        } else {
            // echo "<script>console.log('gagal + $id');</script>";
        }
    }
?>
