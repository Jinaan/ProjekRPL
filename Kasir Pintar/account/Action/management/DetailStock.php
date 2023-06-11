<?php
    include '../../../assets/util/koneksi.php';
    $id = $_GET['id'];
    // query sort by newest
    $query = "SELECT * FROM riwayatubah WHERE idBarang = $id ORDER BY idRiwayatUbah ASC";
    $resultRiwayat = mysqli_query($koneksi, $query);
    $dataBarang = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM barang WHERE idBarang = '$id'"));

?>
<h4 align="center">Detail Sisa Stok</h4><br>
<div class="row">
    <div class="col-md-2">
        <div style="display: block; width: 60px; height: 60px; background: #1a8b8c; background-position: center; background-size: cover; border-radius: 100%">
            <p align="center" style="color: #fff; margin: auto; line-height: 30px; font-size:12px"></p>
        </div>
    </div>
    <div class="col-md-6">
        <p class="p-reg">Nama: <?php echo $dataBarang['nama']; ?></p>
        <p class="p-reg">Kategori: <?php echo $dataBarang['kategori']; ?></p>
    </div>
    <div class="col-md-4">
        <p class="p-reg">Kode:</p>
        <p class="p-reg"><?php echo $dataBarang['kode']; ?></p>
    </div>
</div><br>
<table class="table table-hover table-striped" id="dataTables">
    <thead class="tbl-head">
        <tr>
            <td>Terakhir Diubah</td>
            <td>Stok</td>
            <td>Satuan</td>
            <td>Harga Dasar</td>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($resultRiwayat as $data) {
        ?>
        <tr>
            <td><?php echo $data['tanggalUbah']; ?></td>
            <td><?php echo $data['jumlah']; ?></td>
            <td><?php echo $dataBarang['satuan']; ?></td>
            <td>Rp <?php echo $data['HargaUbah']; ?></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>