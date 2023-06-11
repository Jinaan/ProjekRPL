<?php
    include '../../../assets/util/koneksi.php';
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE idBarang = '$id'");
    $data = mysqli_fetch_array($query);
?>
<h4 align="center">Ubah Stok</h4>
<div class="row">
    <div class="col-md-2">
                    <div style="display: block; width: 60px; height: 60px; background: #1a8b8c; background-position: center; background-size: cover; border-radius: 100%"><p align="center" style="color: #fff; margin: auto; line-height: 30px; font-size:12px"></p></div>
            </div>
    <div class="col-md-6">
        <p class="p-reg">Nama: 
            <?php echo $data['nama']; ?>
        </p>
        <p class="p-reg">Kategori: 
            <?php echo $data['kategori']; ?>
        </p>
        <p class="p-reg">Sisa Stok: 
            <?php echo $data['stok']; ?>
        </p>
    </div>
    <div class="col-md-4">
        <p class="p-reg">Kode:</p>
        <p class="p-reg">
            <?php echo $data['kode']; ?>
        </p>
    </div>
</div><br>
<div style="display: flex; justify-content: center;">
    <ul class="nav nav-pills ulTambahKurang">
        <li class="li firstLi active" onclick="tambahTab();">
            <a  href="" data-toggle="tab">Tambahkan</a>
        </li>
        <li class = "li secondLi " onclick="kurangTab();">
            <a href="" data-toggle="tab">Kurangi</a>
        </li>
    </ul>
</div><br>
<div class="tab-content clearfix">


    <div class="tab-pane tambahForm active" id="TambahForm" >
        <form action="" method="POST">
            <input type="hidden" name="idBarang" value="<?php echo $id; ?>">   
            <!-- <div class="form-group">
                <p class="p-reg">Tanggal</p>
                <input type="date" name="tanggal" value="
                " class="datepicker form-control" display="none">
            </div> -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <p class="p-reg">Harga Beli</p>
                        <input name="harga_beli" type="text" value="1" class="form-control decimal" onkeypress="return isValidEdit(this, event)">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <p class="p-reg">Jumlah</p>
                        <input name="jumlah" step="any" type="text" value="1" class="form-control stok" onkeypress="return isValidStok(this, event)">
                    </div>
                </div>
            </div>
            <br>
                <button type="button" id="submitTambahStock" class="btn button-hijau pull-right" onclick="tambahStock();"
                >Tambah Stok</button>
        </form>
    </div>



    <div class="tab-pane kurangForm " id="KurangForm" >
        <?php
            $id = $_GET['id'];
            echo "<form action='DecreaseStockBarang.php?id=$id' method='POST'>";
        ?>
            <input type="hidden" name="idBarang" value="<?php echo $id; ?>">
            <!-- <div class="form-group">
                <p class="p-reg">Tanggal</p>
                <input name="tanggal" type="date" value="2023-05-31" class="datepicker form-control">
            </div> -->
            <div class="form-group">
                <p class="p-reg">Jumlah</p>
                <input name="jumlah" type="text" step="any" value="1" class="form-control stok" onkeypress="return isValidStok(this, event)">
            </div>
            <br>
                <button type="button" id="submitKurangiStock" class="btn button-hijau pull-right" onclick="kurangiStock();"
                >Kurangi Stok</button>
        </form>
    </div>
</div>


