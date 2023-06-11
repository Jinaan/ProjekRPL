<?php
    include '../../../assets/util/koneksi.php';
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE idBarang = '$id'"); 
    $data = mysqli_fetch_array($query);
    $firstLetter = substr($data['nama'], 0, 1);
?>
<div class="row">
    <div class="col-md-12" id="guideEdit">
        <br>
        <a class="btn button-primer" 
            href="Action\EditDetailBarang.php?id=<?php echo $data['idBarang']; ?>">
            Edit Barang
        </a>

        <a data-toggle="modal" data-target="#hapusBarangKode"
            class="btn button-edit-detail-delete font-red font-14-5 pull-right">Hapus
        </a>
    </div>
</div><br>
<button class="btn button-silver " id="barangData" style="width: 100%">Data Barang</button>
<br><br>


<div class="row" id="dataBrg" style="display: block">
    <div class="col-md-6">
        <div class="gambar_barang_besar">
            <p align="center" class="tulisan_barang_besar"><?php echo $firstLetter; ?></p>
        </div>
    </div>
    <div class="col-md-6" display="none">
        <p class="font-12 font-gray-bold medium ">Id<br><span  id="KodeBarangId" class="font-14 font-black"><?php echo $data['idBarang']; ?></span></p>
            
    </div>
    <div class="col-md-6">
        <p class="font-12 font-gray-bold medium ">Kode<br><span class="font-14 font-black"><?php echo $data['kode']; ?></span></p>
            
    </div>
    <div class="col-md-6">
        <p class="font-12 font-gray-bold medium">Nama<br><span class="font-14 font-black"><?php echo $data['nama']; ?></span></p>
    </div>
    <div class="col-md-6">
        <p class="font-12 font-gray-bold medium">Kategori<br><span class="font-14 font-black"><?php echo $data['kategori']; ?></span></p>
    </div>
    <div class="col-md-6">
        <p class="font-12 font-gray-bold medium">Harga Beli<br><span class="font-14 font-black">Rp <?php echo $data['hargaBeli']; ?></span></p>
    </div>
    <div class="col-md-6">
        <p class="font-12 font-gray-bold medium">Harga Jual<br><span class="font-14 font-black">Rp <?php echo $data['hargaJual']; ?></span></p>
    </div>
    <div class="col-md-6">
        <p class="font-12 font-gray-bold medium">Stok<br>
            <span class="font-14 font-black" id="totVar">
                <?php 
                    echo $data['stok'];
                ?>
            </span>
        </p>
    </div>
    <div class="col-md-6">
        <p class="font-12 font-gray-bold medium">Satuan<br><span class="font-14 font-black"> <?php echo $data['satuan']; ?></span></p>
    </div>
    <div class="col-md-6">
        <p class="font-12 font-gray-bold medium">Keterangan<br><span class="font-14 font-black"> <?php echo $data['keterangan']; ?></span></p>
    </div>
    <div class="col-md-6">
        <p class="font-12 font-gray-bold medium">Terakhir Diubah<br><span class="font-14 font-black">2023-06-03</span>
        </p>
    </div>

    <div class="modal fade" id="infoDisableRemove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-small ">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="card-title">Peringatan</h4>
                </div>
                <div class="modal-body text-center">
                    <div class="card-content">
                        <p id="detailInfo" class="font-14 medium font-gray-bold"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn button-feature" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>