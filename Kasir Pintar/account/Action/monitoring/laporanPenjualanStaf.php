<?php
    include '../../../assets/util/koneksi.php';
    $dataJson = file_get_contents('php://input');
    $data = json_decode($dataJson, true);
    $date = $data['date'];
    // $date = '2023-06-09';
    $dataAkun = array();

    $cekTransaksi = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE tanggal = '$date'");
    $cekTransaksi = mysqli_fetch_array($cekTransaksi);
    if (!$cekTransaksi) {
        echo 'FALSE';
        exit();
    }


    // get all data staff from table akun with posisi = kasir
    $queryAkun = mysqli_query($koneksi, "SELECT * FROM akun WHERE posisi = 'kasir'");
    while ($row = mysqli_fetch_assoc($queryAkun)) {
        // nama	email	password	nohp	posisi	
        $dataTemp = array(
            'nama' => $row['nama'],
            'email' => $row['email'],
            'password' => $row['password'],
            'nohp' => $row['nohp'],
            'posisi' => $row['posisi'],
        );
        array_push($dataAkun, $dataTemp);
    }
    // echo json_encode($dataAkun);

    // get all data transaksi from table transaksi with tanggal = $date
    $dataTransaksi = array();
    $queryTransaksi = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE tanggal = '$date'");
    while ($row = mysqli_fetch_assoc($queryTransaksi)) {
        // id_transaksi	id_akun	tanggal	total	
        $dataTemp = array(
            // idTransaksi	email	totaljual	totaluntung	tanggal	
            'idTransaksi' => $row['idTransaksi'],
            'email' => $row['email'],
            'tanggal' => $row['tanggal'],
            'totaljual' => $row['totaljual'],
            'totaluntung' => $row['totaluntung'],
        );
        array_push($dataTransaksi, $dataTemp);
    }
    // echo json_encode($dataTransaksi);


    $untungTotal = 0;
    $terjualTotal = 0;
    $pendapatanTotal = 0;





    $dataTransaksiDisplay = array();
    foreach ($dataAkun as $akun) {
        $totalJual = 0;
        $totalUntung = 0;
        $totalTransaksi = 0;
        foreach ($dataTransaksi as $transaksi) {
            if ($akun['email'] == $transaksi['email']) {
                $totalJual += $transaksi['totaljual'];
                $totalUntung += $transaksi['totaluntung'];
                $totalTransaksi++;
            }
        }
        
        $dataTemp = array(
            'nama' => $akun['nama'],
            'totalJual' => $totalJual,
            'totalUntung' => $totalUntung,
            'totalTransaksi' => $totalTransaksi,
        );
        array_push($dataTransaksiDisplay, $dataTemp);
        $untungTotal += $totalUntung;
        $terjualTotal += $totalTransaksi;
        $pendapatanTotal += $totalJual;
    }
    // if totalTransaksi == 0, then delete the data
    foreach ($dataTransaksiDisplay as $key => $value) {
        if ($value['totalTransaksi'] == 0) {
            unset($dataTransaksiDisplay[$key]);
        }
    }
    // echo json_encode($dataTransaksiDisplay);


    // sort dataTransaksiDisplay by totalJual
    $totalJual = array();
    foreach ($dataTransaksiDisplay as $key => $value) {
        $totalJual[$key] = $value['totalJual'];
    }
    array_multisort($totalJual, SORT_DESC, $dataTransaksiDisplay);
    //////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////
        $dataLaporanStaff = json_encode($dataTransaksiDisplay);
    //////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////




    $dataPenjualanDefault = array();
    $dataTemp = array(
        'totalJual' => $terjualTotal,
        'totalUntung' => $untungTotal,
        'pendapatanTotal' => $pendapatanTotal,
    );
    array_push($dataPenjualanDefault, $dataTemp);
    // echo json_encode($dataPenjualanDefault);

    




    // get all kode barang
    $dataRawBarang = array();
    $query = mysqli_query($koneksi, "SELECT * FROM barang");
    while ($row = mysqli_fetch_assoc($query)) {
        // kode	namaBarang	hargaBeli	hargaJual	stok	
        $dataTemp = array(
            'kode' => $row['kode'],
            'namaBarang' => $row['nama'],
            'hargaBeli' => $row['hargaBeli'],
            'hargaJual' => $row['hargaJual'],
            'stok' => $row['stok'],
        );
        array_push($dataRawBarang, $dataTemp);
    }

    // get all data transaksi detail from table riwayattransaksi detail with tanggal = $date and kode = $kode
    $dataTransaksiDetail = array();
    foreach ($dataRawBarang as $barang) {
        $kode = $barang['kode'];
        $terjual = 0;
        $query = mysqli_query($koneksi, "SELECT * FROM riwayattransaksi WHERE tanggal = '$date' AND kodeBarang = '$kode'");
        while ($row = mysqli_fetch_assoc($query)) {
            $terjual += $row['Terjual'];
        }
        $dataTemp = array(
            'kode' => $kode,
            'namaBarang' => $barang['namaBarang'],
            'hargaBeli' => $barang['hargaBeli'],
            'hargaJual' => $barang['hargaJual'],
            'stok' => $barang['stok'],
            'terjual' => $terjual,
        );
        array_push($dataTransaksiDetail, $dataTemp);
    }
    // echo json_encode($dataTransaksiDetail);
    // [{"kode":"qwe","namaBarang":"qwe","hargaBeli":"1","hargaJual":"13","stok":"9","terjual":12},{"kode":"asd","namaBarang":"asd","hargaBeli":"123","hargaJual":"123","stok":"123","terjual":1}]
    // sort dataTransaksiDetail by terjual
    $terjual = array();
    foreach ($dataTransaksiDetail as $key => $value) {
        $terjual[$key] = $value['terjual'];
    }
    array_multisort($terjual, SORT_DESC, $dataTransaksiDetail);
    // echo json_encode($dataTransaksiDetail);

    //////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////
        $dataLaporanBarang = json_encode($dataTransaksiDetail);
    //////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////







    // combine dataLaporanStaff, dataPenjualanDefault, dataLaporanBarang
    $dataLaporan = array(
        'dataLaporanStaff' => $dataLaporanStaff,
        'dataPenjualanDefault' => $dataPenjualanDefault,
        'dataLaporanBarang' => $dataLaporanBarang,
    );


    echo json_encode($dataLaporan);

?>

