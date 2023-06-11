<?php
    include '../util/koneksi.php';
    $KodeRegist = $_POST['KodeRegist'];
    $query = mysqli_query($koneksi, "SELECT * FROM regist WHERE kode = '$KodeRegist'");
    $data = mysqli_fetch_array($query);
    if ($data) {
        echo 'true';
    } else {
        echo 'false';
    }
?>