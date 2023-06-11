<?php
    include '../../../assets/util/koneksi.php';
    $posisi = $_POST['posisi'];
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $kode = substr(str_shuffle($chars), 0, 15);
    $query = mysqli_query($koneksi, "INSERT INTO regist (kode, posisi) VALUES ('$kode', '$posisi')");
    
    $dataSend = array();
    $query = mysqli_query($koneksi, "SELECT * FROM regist");
    $row = mysqli_num_rows($query);
    if ($row > 0) {
        while ($data = mysqli_fetch_array($query)) {
            $dataTemp = array(
                'kode' => $data['kode'],
                'posisi' => $data['posisi']
            );
            array_push($dataSend, $dataTemp);
        }
        echo json_encode($dataSend);
    } else {
        echo 'false';
    }
?>