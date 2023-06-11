<?php
    include '../../../assets/util/koneksi.php';
    $dataJson = file_get_contents('php://input');
    $data = json_decode($dataJson, true);
    $password = $data['password'];
    session_start();
    $email = $_SESSION['email'];
    $query = mysqli_query($koneksi, "UPDATE akun SET password = '$password' WHERE email = '$email'");
    if ($query) {
        echo 'success';
    } else {
        echo 'Failed';
    }
?>