<?php
    include "koneksi.php";
    $sql = "SELECT * FROM kategori";
    $result = $koneksi->query($sql);
    $kategori = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // mengembalikan nilai berupa array nama kategori
            $kategori[] = $row['nama_kategori'];
        }
    }
    else {
        echo "<script>console.log('Tidak ada kategori yang tersedia');</script>";
    }
?>