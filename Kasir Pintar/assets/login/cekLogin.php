<?php
    include '../util/koneksi.php';
    $dataJson = file_get_contents('php://input');
    $data = json_decode($dataJson, true);
    $email = $data['email'];
    $password = $data['password'];

    
    $query = mysqli_query($koneksi, "SELECT * FROM akun WHERE email = '$email' AND password = '$password'");
    $data = mysqli_fetch_array($query);
    if ($data) {
        echo 'Success';
    } else {
        echo 'Failed';
    }
?>