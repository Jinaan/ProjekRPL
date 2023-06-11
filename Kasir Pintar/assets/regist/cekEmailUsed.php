<?php
    include '../util/koneksi.php';
    $email = $_GET['email'];
    $query = mysqli_query($koneksi, "SELECT * FROM akun WHERE email = '$email'");
    $data = mysqli_fetch_array($query);
    if ($data) {
        echo 'double';
    } else {
        echo 'not double';
    }
?>