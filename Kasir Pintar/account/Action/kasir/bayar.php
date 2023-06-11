<?php
    include '../../../assets/util/koneksi.php';
    session_start();
    $dataJson = file_get_contents('php://input');
    $data = json_decode($dataJson, true);
    // kodeBarang: kodeBarang,
    // jumlahBarang: jumlahBarang,
    // total: total
    $kodeBarang = $data['kodeBarang'];
    $jumlahBarang = $data['jumlahBarang'];
    $totalJual = $data['totalJual'];
    $totalUntung = 0;
    for ($i = 0; $i < count($kodeBarang); $i++) {
        // get currnt stok
        $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE kode = '$kodeBarang[$i]'");
        $data = mysqli_fetch_array($query);
        $totalUntung += ($data['hargaJual'] - $data['hargaBeli']) * $jumlahBarang[$i];
        $stokTemp = $data['stok'];
        $stokTemp -= $jumlahBarang[$i];
        // update stok
        $query = mysqli_query($koneksi, "UPDATE barang SET stok = '$stokTemp' WHERE kode = '$kodeBarang[$i]'");
    }
    // id transaksi = date and time now
    $idTransaksi = date("YmdHis");
    $email = $_SESSION['email'];
    // insert idTra, email, totalJual, totalUntung, dan tanggal sekarang(tanggal bulan tahun) ke tabel transaksi
    $query = mysqli_query($koneksi, "INSERT INTO transaksi VALUES ('$idTransaksi', '$email', '$totalJual', '$totalUntung', CURDATE())");

    for ($i = 0; $i < count($kodeBarang); $i++) {
        // insert idTra, kodeBarang, jumlahBarang, dan tanggal sekarang ke tabel riwayattransaksi
        $query2 = mysqli_query($koneksi, "INSERT INTO riwayattransaksi VALUES ('$idTransaksi', '$kodeBarang[$i]', '$jumlahBarang[$i]', CURDATE(), '')");
    }

    if ($query && $query2) {
        echo 'success';
    } else {
        if (!$query) {
            echo 'Failed';
        } else {
            echo 'Failed2';
        }
    }
?>