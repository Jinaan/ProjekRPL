<?php
    include '../util/koneksi.php';
    $dataJson = file_get_contents('php://input');
    $data = json_decode($dataJson, true);
    // nama: nama,
    // email: email,
    // password: password,
    // hp: hp,
    // current_url: current_url
    $nama = $data['nama'];
    $email = $data['email'];
    $password = $data['password'];
    $hp = $data['hp'];
    $kodeRegist = $data['kodeRegist'];

    $query = mysqli_query($koneksi, "SELECT * FROM regist WHERE kode = '$kodeRegist'");
    $data = mysqli_fetch_array($query);
    $posisi = $data['posisi'];
    
    $query = mysqli_query($koneksi, "INSERT INTO akun (nama, email, password, nohp, posisi) VALUES ('$nama', '$email', '$password', '$hp', '$posisi')");

    if ($query) {
        $query = mysqli_query($koneksi, "DELETE FROM regist WHERE kode = '$kodeRegist'");
        echo 'success';
    } else {
        echo 'failed';
    }
?>