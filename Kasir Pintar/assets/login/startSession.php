<?php
    include '../util/koneksi.php';
    $dataJson = file_get_contents('php://input');
    $data = json_decode($dataJson, true);
    $email = $data['email'];
    $password = $data['password'];
    session_start();

    $query = mysqli_query($koneksi, "SELECT * FROM akun WHERE email = '$email' AND password = '$password'");
    $data = mysqli_fetch_array($query);
    if ($data) {
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['noHp'] = $data['nohp'];
        $_SESSION['posisi'] = $data['posisi'];
        echo 'Success';
    } else {
        echo 'Failed';
    }
?>
