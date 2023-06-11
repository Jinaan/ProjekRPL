<?php
    include '../util/koneksi.php';
    $dataJson = file_get_contents('php://input');
    $data = json_decode($dataJson, true);
    $kodeRegist = $data['kodeRegist'];
    $query = mysqli_query($koneksi, "DELETE FROM regist WHERE kode = '$kodeRegist'");
    if ($query) {
        echo 'true';
    } else {
        echo 'false';
    }
?>