<!-- kode_barang -->
<!-- nama_barang -->
<!-- kategori
harga_beli
harga_jual
stok
berat_dan_satuan
keterangan -->

<?php
    include '../../../assets/util/koneksi.php';
    $id = $_POST['id'];
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    // $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    // $stok = $_POST['stok'];
    $berat_dan_satuan = $_POST['berat_dan_satuan'];
    $keterangan = $_POST['keterangan'];

    // echo "<script>console.log($id);</script>";
    // echo "<script>console.log($kode_barang);</script>";
    // echo "<script>console.log($nama_barang);</script>";
    // echo "<script>console.log($kategori);</script>";
    // echo "<script>console.log($harga_beli);</script>";
    // echo "<script>console.log($harga_jual);</script>";
    // echo "<script>console.log($stok);</script>";
    // echo "<script>console.log($berat_dan_satuan);</script>";
    // echo "<script>console.log($keterangan);</script>";
    $query = mysqli_query($koneksi, "UPDATE barang SET kode = '$kode_barang', nama = '$nama_barang', kategori = '$kategori', hargaJual = '$harga_jual', satuan = '$berat_dan_satuan', keterangan = '$keterangan' WHERE idBarang = '$id'");
    // if ($query) {
    //     echo '1';
    // } else {
    //     echo '0';
    // }
?>
