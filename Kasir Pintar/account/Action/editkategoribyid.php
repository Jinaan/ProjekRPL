<?php
    include '../../assets/util/koneksi.php';
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE idKategori = '$id'");
    $data = mysqli_fetch_array($query);
?>

<h4 align="center">Ubah Kategori</h4>
<form method="POST" action="../assets/util/editKategori.php" enctype="multipart/form-data" class="margins-up-mg">
    <div id="form-soal" class="form-group label-floating">
        <div class="form-group float-label-control">
            <p class="p-reg">Masukkan Nama Kategori</p>
            <input name="EditTextField" type="text" maxlength="80" class="form-control" placeholder="Masukkan Nama Kategori" value="<?php echo $data['namaKategori']; ?>" required>
            <input name="id" type="hidden" value="<?php echo $data['idKategori']; ?>" display="none">
        </div>
    </div>
    <button type="button" id="UbahKategoriBtn" class="btn button-hijau pull-right" onclick="checkDouble()">Simpan</button>
</form>
<!-- script on page load get -->

<!-- <script>
    function checkDouble() {
        // get current url
        var url = window.location.href;
        var nama = document.getElementsByName('EditTextField')[0].value;
        console.log(nama);
        var id = document.getElementsByName('id')[0].value;
        console.log(id);
                document.getElementsByName('EditTextField')[0].value = url;
        // set ElementsByName('nama') value to url
        // console.log(url);
        $.ajax({
            url: 'Action/check_double_kategori.php',
            type: 'POST',
            data: {
                nama: nama,
                id: id
            },
            success: function (data) {
                // if (data == 'double') {
                //     document.getElementByName('nama')[0].value = '';
                // } else {
                //     document.getElementById('form-soal').submit();
                // }
                document.getElementById('NamaFieldEdit')[0].value = url;
            }
        });
    }
</script> -->
