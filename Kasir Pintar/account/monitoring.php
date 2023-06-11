<?php
    session_start(); 
    if (!isset($_SESSION['email'])) {
        header("Location: ../login.php");
    }
?>
<html>

<head>
    <title>Kasir Pintar&reg;</title>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../gambar/logokasir.webp">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="theme-color" content="#00796b">

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    

    <!-- Bootstrap core CSS     -->
    <link href="../dashboard/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../dashboard/css/fresh-bootstrap-table.css" rel="stylesheet" />


    <!--  Light Bootstrap Table core CSS    -->
    <link href="../dashboard/css/light-bootstrap-dashboard-v4.css"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" />

    <link href="../dashboard/css/kp.css?v=1684252247" rel="stylesheet" />
    <meta name="google-signin-client_id"
        content="433891833837-s9t6ombm4qo456h549qo5uqs1r3p9lsl.apps.googleusercontent.com">

    <!--     Fonts and icons     -->
    <script src="../source/js/feather.min.js?v=1684252247"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="../source/js/platform.js?v=1684252247" async defer></script>
    <link href="../dashboard/css/morris.css?v=1684252247" rel="stylesheet" />
    <link href="../dashboard/css/MonthPicker.css?v=1684252247" rel="stylesheet" />
    <!-- <link href="https://fonts.googleapis.com/css?family=Asap|Lato" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/intlTelInput.css?v=1684252247">
    <link rel="stylesheet" href="../css/custom.css?v=1684252247">
    <link rel="stylesheet" href="../vendor/toastr/toastr.min.css?v=1684252247">


</head>

<body data-spy="scroll" data-target=".wrapper">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../vendor/spinner-animate/three-quarters.css?v=1684252703">
    <link rel="stylesheet" href="../vendor/spinner-animate/custom.css?v=1684252703">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../source/tour/css/hopscotch.css?v=1684252703">
    <script src="../source/js/raphael-min.js?v=1684252703"></script>
    <script src="../dashboard/js/jquery-1.10.2.js?v=1684252703" type="text/javascript"></script>
    <script src="../source/js/jquery-ui.min.js?v=1684252703"></script>
    <script src="../dashboard/js/morris.js?v=1684252703" type="text/javascript"></script>
    <script type="text/javascript" src="../js/vue.min.js"></script>
    <script src="../js/intlTelInput.js?v=1684252703"></script>
    <script src="../dashboard/js/MonthPicker.js?v=1684252703" type="text/javascript"></script>
    <script src="../source/tour/js/hopscotch.js?v=1684252703"></script>
    <div class="overlay" style="display: none">
        <div class="three-quarters-loader loader-custom">Loading…</div>
    </div>
    <div class="wrapper">
        <div style="background-color: #00AF81" class="sidebar">
            <input type="hidden" name="_token" value="4NyPfyAGe5cgs6K9iP4TwZrClFv6i6M5Yxr5HtUO" />
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a class="simple-text logo-normal"><img
                            src="../images/kasirpintarLogo.webp"
                            style="padding-left: 30px; padding-right: 30px; width: 100%" alt="logo kasir pintar"></a>
                </div>

                <ul class="nav" id="accordion">

                    <?php if ($_SESSION['posisi'] == 'admin' || $_SESSION['posisi'] == 'pemilik') { ?>
                        <li class="">
                            <a href="../account/monitoring.php">
                                <p class="upper-text">Dashboard</p>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if ($_SESSION['posisi'] == 'pemilik' || $_SESSION['posisi'] == 'kasir') { ?>
                        <li class="">
                            <a href="../account/Kasir.php">
                                <p class="upper-text">Kasir</p>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if ($_SESSION['posisi'] == 'admin' || $_SESSION['posisi'] == 'gudang' || $_SESSION['posisi'] == 'pemilik') { ?>
                        <li class="panel">
                            <a data-toggle="collapse" href="#dataBarang" data-parent="#accordion">
                                <p class="upper-text">Database <span class="caret" style="float: right;"></span></p>
                            </a>
                            <div class="collapse bg-green-dark" id="dataBarang">
                                <ul class="nav" id="accordionSub">
                                    <li class="side-menu">
                                        <a href="../account/database.php">
                                            <p>Barang atau Jasa</p>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="../account/management_stok.php">
                                            <p>Manajemen Stok</p>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="../account/kategori.php">
                                            <p>Kategori</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>

                    <li class="panel">
                        <a data-toggle="collapse" href="#pengaturan" data-parent="#accordion">
                            <p class="upper-text">Pengaturan<span class="caret" style="float: right;"></span></p>
                        </a>
                        <div class="collapse bg-green-dark" id="pengaturan">
                            <ul class="nav" id="accordionSub">
                                <li class="">
                                    <a href="../account/profil.php">
                                        <p>Profil</p>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="../account/changepassword.php">
                                        <p>Ganti Password</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>




                </ul>
            </div>
        </div>
        <div class="main-panel-v2">
            <script>
                $(document).ready(function () {
                    $(".alert").fadeTo(5000, 1000).slideUp(1000, function () {
                        $(".alert").slideUp(1000);
                    });
                });
            </script>
            <link href="../source/css/select2.min.css?v=1684252247" rel="stylesheet" />

            <style type="text/css">
                .mobileShow {
                    display: none;
                }

                /* Smartphone Portrait and Landscape */

                @media only screen and (min-device-width: 150px) and (max-device-width: 992px) {
                    .mobileShow {
                        display: inline;
                    }
                }

                .select2-results__message {
                    display: none !important;
                }

                .select2-container .select2-selection--single,
                .select2-container .select2-selection--single .select2-selection__arrow {
                    height: 40px;
                    border: 1px solid #d1d2d3;
                }

                .select2-container--default .select2-selection--single .select2-selection__rendered {
                    line-height: 40px;
                    text-align: left;
                }

                .select2-container--default .select2-results>.select2-results__options {
                    max-height: 100px;
                    overflow-y: auto;
                }
            </style>
















            <nav class="navbar navbar-default drop-shadow" style="background: #fff; border: none; margin-bottom: 0px">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <div class="d-flex flex-row align-items-center" style="margin-right: 60px">
                            <div class="mobileShow">
                                <a style="text-transform: capitalize; font-weight: bold; color: #9A9A9A; display: block; margin-left: 20px;"
                                    href="#" class="dropdown-toggle" data-toggle="dropdown"><br>
                                    <?php
                                        echo $_SESSION['nama'];
                                    ?>
                                    <span><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                                </a>
                                <ul class="dropdown-menu" style="z-index: 1000">
                                    <li class="font-12 medium font-gray-bold"><a href="../account">Masuk
                                            sebagai<br><span class="font-14 font-black">Pusat :
                                                <?php
                                                    echo $_SESSION['nama'];
                                                ?>
                                            </span></a></li>
                                    <li class="medium font-gray-bold"><a href="../account/profil.php">Profil</a></li>

                                    <li class="divider"></li>

                                    <li class="divider"></li>
                                    <li class="medium font-gray-bold"><a href="../account/logout.php"
                                            onclick="signOut();">Keluar</a></li>
                                </ul>
                            </div>
                        </div>

                        <button style="margin-top: -40px;" type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#navigation-example-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a style="text-transform: capitalize;" href="#" class="font-14 medium font-grey-bold"
                                    class="dropdown-toggle" data-toggle="dropdown">
                                    <?php
                                        echo $_SESSION['nama'];
                                    ?>
                                    <span><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                                </a>
                                <ul class="dropdown-menu" style="z-index: 1000">
                                    <li class="medium font-gray-bold"><a href="../account/profil.php">Profil</a></li>
                                    <li class="medium font-gray-bold"><a href="../account/changepassword.php">Ganti
                                            Password</a>
                                    </li>


                                    <li class="divider"></li>
                                    <li class="medium font-gray-bold"><a 
                                            onclick="signOut();">Keluar</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">

                        </ul>

                    </div>
                </div>
            </nav>























            <script src="../source/js/select2.min.js?v=1684252703"></script>
            <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.0-rc.4/dist/js.cookie.min.js"
                integrity="sha256-srkrqNQxQ5PTxynPlMErZaHbKkH7Z2slLwYPjq/dLv0=" crossorigin="anonymous"></script>
            
            <div class="content bg-main">
                <div class="padd-main">
                    <span class="font-18 semi-bold font-black">Dashboard</span>
                    <div class="row margin-top-20">
                        <div class="col-md-4">
                            <div id="reportrange" class="form-control mouse">
                                <i class="fa fa-calendar"></i>&nbsp;
                                <span class="font-14 medium font-gray-bold"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row margin-top-20">
                        <div class="col-md-4">
                            <div class="card padd-card">
                                <div class="d-flex">
                                    <span class="font-16 medium font-black m-auto">Jumlah Transaksi</span>
                                    <span class="font-14 medium font-gray-bold" id="nowDate1">16-05-2023</span>
                                </div>
                                <div class="d-flex margin-top-20">
                                    <img src="../dashboard/img/premium/coin-list.png"
                                        class="m-auto" width="10%">
                                    <span class="font-18 medium font-green" id="HeadTransaksi">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card padd-card">
                                <div class="d-flex">
                                    <span class="font-16 medium font-black m-auto">Pendapatan</span>
                                    <span class="font-14 medium font-gray-bold" id="nowDate2">16-05-2023</span>
                                </div>
                                <div class="d-flex margin-top-20">
                                    <img src="../dashboard/img/premium/coin-list.png"
                                        class="m-auto" width="10%">
                                    <span class="font-18 medium font-green" id="HeadPendapatan">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card padd-card">
                                <div class="d-flex">
                                    <span class="font-16 medium font-black m-auto">Keuntungan</span>
                                    <span class="font-14 medium font-gray-bold" id="nowDate3">16-05-2023</span>
                                </div>
                                <div class="d-flex margin-top-20">
                                    <img src="../dashboard/img/premium/coin-list.png"
                                        class="m-auto" width="10%">
                                    <span class="font-18 medium font-green" id="HeadKeuntungan">0</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card padd-card">
                        <div class="d-flex">
                            <span class="font-18 medium font-black m-auto">Laporan Penjualan Barang</span>
                        </div>
                        <span class="font-14 medium font-gray-bold" id="nowDate4">Selasa, 16 Mei 2023 </span>
                        <div class="table-responsive margin-top-10">
                            <table class="table table-striped">
                                <thead class="thead-light">
                                    <tr class="tb-border">
                                        <td class="tb-head">Kode</td>
                                        <td class="tb-head">Nama</td>
                                        <td class="tb-head">Jumlah Barang</td>
                                        <td class="tb-head">Jumlah Terjual</td>
                                        <td class="tb-head">Keuntungan</td>
                                        <td class="tb-head">Pendapatan</td>
                                    </tr>
                                </thead>
                                <tbody id="tableBarang">
                                </tbody>
                            </table>
                        </div><br><br>


                        <div class="d-flex margin-top-20">
                            <span class="font-18 medium font-black m-auto">Laporan Penjualan Per Staff</span>
                        </div>
                        <span class="font-14 medium font-gray-bold" id="nowDate5">Selasa, 16 Mei 2023 </span>
                        <div class="table-responsive margin-top-10">
                            <table class="table table-striped">
                                <thead class="thead-light">
                                    <tr class="tb-border">
                                        <td class="tb-head">Nama</td>
                                        <td class="tb-head">Jumlah Transaksi</td>
                                        <td class="tb-head">Keuntungan</td>
                                        <td class="tb-head">Pendapatan</td>
                                    </tr>
                                </thead>
                                <tbody id="tableStaff">
                                </tbody>
                            </table>
                        </div><br><br>

<!-- 
                        <div class="d-flex margin-top-20">
                            <span class="font-18 medium font-black m-auto">Laporan Manajemen Stok</span>
                        </div>
                        <span class="font-14 medium font-gray-bold" id="nowDate6">Selasa, 16 Mei 2023 </span>
                        <div class="table-responsive margin-top-10">
                            <table class="table table-striped">
                                <thead class="thead-light">
                                    <tr class="tb-border">
                                        <td class="tb-head">Kode</td>
                                        <td class="tb-head">Nama</td>
                                        <td class="tb-head">Stok</td>
                                        <td class="tb-head">Keterangan</td>
                                    </tr>
                                </thead>
                                <tbody id="tableStok">
                            </table>
                        </div> -->
                    </div>
                </div>
            </div>
            <footer class="footer fixed-bottom">

                <div class="container-fluid">
                    <!--p class="copyright pull-right">
			&copy; 2016 -
			<script>
				document.write(new Date().getFullYear())
			</script> <a href="..">Kasir Pintar</a> by OWLINE
		</p-->
                </div>
        </div>
        </footer>
    </div>
    </div>



    <style>
        @media screen and (min-width: 1024px) {
            .mg-foot {
                margin-right: 5.5vw;
            }

            .wd-button {
                width: 200px;
            }
        }

        @media screen and (min-width: 320px) and (max-width: 640px) {
            .mg-foot {
                margin-right: 20vw;
            }
        }
    </style>
    <script type="text/javascript" src="../source/js/moment.min.js"></script>
    <script src="../source/js/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="../source/js/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../source/css/daterangepicker.css" />
    <script type="text/javascript">
        $(function () {
            // date now (yyyy-mm-dd)
            var now = moment().format('YYYY-MM-DD');
            var start = moment(now, 'YYYY-MM-DD').locale('id');
            var end = moment(now, 'YYYY-MM-DD').locale('id');

            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY'));
                // window.location.replace('../account/monitoring_data/' + end.format('YYYY-MM-DD') + '/' + 'show_dapat/show_untung');
                dateReplace(end.format('YYYY-MM-DD'));
            }

            $('#reportrange').daterangepicker({
                singleDatePicker: true,
                showCustomRangeLabel: false,
                startDate: start,
                endDate: end,
                ranges: {
                    'Hari Ini': [moment(), moment()],
                    'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                }
            }, cb);
            $('#reportrange span').html(start.format('MMMM D, YYYY'));
            dateReplace(now);
        });
    </script>
    <script>
        function dateReplace(ChosenDate){
            // change format date from yyyy-mm-dd to dd-mm-yyyy
            var SelectedDate = ChosenDate.split('-');
            SelectedDate = SelectedDate[2] + '-' + SelectedDate[1] + '-' + SelectedDate[0];

            var nowDate1 = document.getElementById('nowDate1');
            var nowDate2 = document.getElementById('nowDate2');
            var nowDate3 = document.getElementById('nowDate3');
            var nowDate4 = document.getElementById('nowDate4');
            var nowDate5 = document.getElementById('nowDate5');
            // var nowDate6 = document.getElementById('nowDate6');

            nowDate1.innerHTML = SelectedDate;
            nowDate2.innerHTML = SelectedDate;
            nowDate3.innerHTML = SelectedDate;

            // change format date from dd-mm-yyyy to dayName, dd monthName yyyy
            var date = new Date(ChosenDate);
            var dayName = date.toLocaleString('id-ID', { weekday: 'long' });
            var monthName = date.toLocaleString('id-ID', { month: 'long' });
            var year = date.toLocaleString('id-ID', { year: 'numeric' });
            var day = date.toLocaleString('id-ID', { day: 'numeric' });

            nowDate4.innerHTML = dayName + ', ' + day + ' ' + monthName + ' ' + year;
            nowDate5.innerHTML = dayName + ', ' + day + ' ' + monthName + ' ' + year;
            // nowDate6.innerHTML = dayName + ', ' + day + ' ' + monthName + ' ' + year;

            fillLaporan(ChosenDate);
        }

    </script>
    <script>
        function fillLaporan(dateGiven){
            var date = dateGiven;
            console.log(date);
            var xhr = new XMLHttpRequest();
            var dataSend ={
                date: date
            }
            xhr.open('POST', '../account/Action/monitoring/laporanPenjualanStaf.php', true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onload = function () {
                if (this.status == 200) {
                    var raw = this.responseText;
                    if (raw == 'FALSE') {
                        return;
                    }
                    var data = JSON.parse(raw);
                    var data1 = data.dataPenjualanDefault;
                    var data2 = data.dataLaporanStaff
                    var data3 = data.dataLaporanBarang;
                    Promise.all([fillLaporanHead(data1), fillLaporanBarang(data3), fillLaporanStaf(data2)]).then(() => {
                        // console.log('done');
                    });
                }
            }
            xhr.send(JSON.stringify({
                date: date
            }));
        }

        
        function fillLaporanHead(jsonData){
            return new Promise((resolve, reject) => {
                var tPendapatan = document.getElementById('HeadPendapatan');
                var tKeuntungan = document.getElementById('HeadKeuntungan');
                var tTransaksi = document.getElementById('HeadTransaksi');

                tPendapatan.innerHTML = jsonData[0].pendapatanTotal;
                tKeuntungan.innerHTML = jsonData[0].totalUntung;
                tTransaksi.innerHTML = jsonData[0].totalJual;
                resolve();
            });
        }

        function fillLaporanBarang(jsonData){
            return new Promise((resolve, reject) => {
                var tableBarang = document.getElementById('tableBarang');
                jsonData = JSON.parse(jsonData);
                console.log(jsonData);
                tableBarang.innerHTML = '';
                for (var i = 0; i < jsonData.length; i++) {
                    var row = tableBarang.insertRow(i);
                    var cellKode = row.insertCell(0);
                    var cellNama = row.insertCell(1);
                    var cellStok = row.insertCell(2);
                    var cellTerjual = row.insertCell(3);
                    var cellKeuntungan = row.insertCell(4);
                    var cellPendaapatan = row.insertCell(5);


                    cellKode.innerHTML = jsonData[i].kode;
                    cellNama.innerHTML = jsonData[i].namaBarang;
                    cellStok.innerHTML = jsonData[i].stok;
                    cellTerjual.innerHTML = jsonData[i].terjual;
                    cellKeuntungan.innerHTML = (jsonData[i].terjual * jsonData[i].hargaJual) - (jsonData[i].terjual * jsonData[i].hargaBeli);
                    cellPendaapatan.innerHTML = jsonData[i].terjual * jsonData[i].hargaJual;
                    // cellTransaksi.innerHTML = jsonData[i].transaksi;
                    // cellKeuntungan.innerHTML = jsonData[i].keuntungan;
                    // cellPendaapatan.innerHTML = jsonData[i].pendapatan;
                }
                resolve();
            });
        }

        function fillLaporanStaf(jsonData){
            return new Promise((resolve, reject) => {
                var tableStaff = document.getElementById('tableStaff');
                jsonData = JSON.parse(jsonData);
                tableStaff.innerHTML = '';
                for (var i = 0; i < jsonData.length; i++) {
                    var row = tableStaff.insertRow(i);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    cell1.innerHTML = jsonData[i].nama;
                    cell2.innerHTML = jsonData[i].totalTransaksi;
                    cell3.innerHTML = jsonData[i].totalUntung;
                    cell4.innerHTML = jsonData[i].totalJual;
                }
                resolve();
            });
        }


    </script>































    <script type="text/javascript">
        $('#showUntung').click(function (e) {

        });
    </script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>



</body>
<!--   Core JS Files   -->
<script src="../dashboard/js/bootstrap.min.js?v=1684252703" type="text/javascript"></script>
<!--  Checkbox, Radio & Switch Plugins -->
<script src="../dashboard/js/bootstrap-checkbox-radio-switch.js?v=1684252703"></script>

<!--  Notifications Plugin    -->
<script src="../dashboard/js/bootstrap-notify.js?v=1684252703"></script>

<!--  Select Plugin    -->
<script src="../dashboard/js/bootstrap-selectpicker.js?v=1684252703"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="../dashboard/js/light-bootstrap-dashboard.js?v=1684252703"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="../dashboard/js/demo.js?v=1684252703"></script>
<script src="../js/sorttable.js?v=1684252703" type="text/javascript"></script>
<script src="../vendor/toastr/toastr.min.js?v=1684252703"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function signOut() {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Anda akan keluar dari akun ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',

            confirmButtonText: 'Ya, Keluar!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../assets/login/endSession.php';
            }
        })
    }
</script>


<script>
    feather.replace()
</script>
<script>
    $('.close-top-notif').click(function () {
        $('.top-notif').hide()
    })
</script>

























































































<script type="text/javascript">
    function formatRupiah(angka) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return rupiah;
    }

    function convertDateDBtoIndo(string) {
        bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        tanggal = string.split("/")[1];
        bulan = string.split("/")[0];
        tahun = string.split("/")[2];

        return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun;
    }
</script>
<script src="../source/js/platform.js?onload=onLoad" async defer></script>

</html>