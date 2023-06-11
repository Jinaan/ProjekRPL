<?php
    // koneksi ke db kasirpintar
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "kasirpintar";
    $koneksi = new mysqli($host, $user, $pass, $db);
    if ($koneksi->connect_error) {
        die("Koneksi gagal karena : ".$koneksi->connect_error);
    }
    else {
        // echo "<script>console.log('Koneksi berhasil');</script>";
    }
?>