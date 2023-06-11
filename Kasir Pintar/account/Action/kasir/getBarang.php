<?php
    include '../../../assets/util/koneksi.php';
    $searchValue = $_POST['search'];
    // echo $searchValue;
    $sql = "SELECT * FROM barang WHERE kode = '$searchValue'";
    $query = mysqli_query($koneksi, $sql);
    $result = mysqli_fetch_array($query);
    if ($result) {
        $stok = $result['stok'];
    }

    if (!$result) {
        echo "false";
    } else if ($stok == 0) {
        echo "habis";
    } else {
        $data = array(
            'kode_barang' => $result['kode'],
            'nama_barang' => $result['nama'],
            'kategori' => $result['kategori'],
            'hargaBeli' => $result['hargaBeli'],
            'hargaJual' => $result['hargaJual'],
            'stok' => $result['stok'],
            'idBarang' => $result['idBarang']
        );
        echo json_encode($data);
    }

?>
