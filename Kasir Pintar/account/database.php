<?php
    session_start(); 
    if (!isset($_SESSION['email'])) {
        header("Location: ../login.php");
    }
?>
<?php
    include '../assets/util/koneksi.php';
    $limit = 30;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    // echo "<script>console.log($page);</script>";
    $start = ($page - 1) * $limit;
    $sql = "SELECT * FROM barang LIMIT $start, $limit";
    $resultBarang = mysqli_query($koneksi, $sql);
    $Barang = mysqli_query($koneksi, "SELECT * FROM barang");
    $total = mysqli_num_rows($Barang); //total data
    $pages = ceil($total / $limit); //total pages
    $Previous = $page - 1;
    $Next = $page + 1;
    $jumlahPage = ceil($total / $limit);
    // echo "<script>console.log($jumlahPage);</script>";

    $Ketegori = mysqli_query($koneksi, "SELECT * FROM kategori");
    
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
    <link href="../dashboard/css/bootstrap.min.css?v=1684252247" rel="stylesheet" />
    <link href="../dashboard/css/fresh-bootstrap-table.css?v=1684252247" rel="stylesheet" />


    <!--  Light Bootstrap Table core CSS    -->
    <link href="../dashboard/css/light-bootstrap-dashboard-v4.css?v=1684252247" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" />

    <link href="../dashboard/css/kp.css?v=1684252247" rel="stylesheet" />
    <meta name="google-signin-client_id"
        content="433891833837-s9t6ombm4qo456h549qo5uqs1r3p9lsl.apps.googleusercontent.com">

    <!--     Fonts and icons     -->
    <script src="../source/js/feather.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="../source/js/platform.js" async defer></script>
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
    <link rel="stylesheet" href="../vendor/spinner-animate/three-quarters.css?v=1684252247">
    <link rel="stylesheet" href="../vendor/spinner-animate/custom.css?v=1684252247">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../source/tour/css/hopscotch.css?v=1684252247">
    <script src="../source/js/raphael-min.js?v=1684252247"></script>
    <script src="../dashboard/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="../dashboard/js/jquery-1.10.2.js?v=1684252247" type="text/javascript"></script>
    <script src="../source/js/jquery-ui.min.js?v=1684252247"></script>
    <script src="../dashboard/js/morris.js?v=1684252247" type="text/javascript"></script>
    <script type="text/javascript" src="../js/vue.min.js"></script>
    <script src="../js/intlTelInput.js?v=1684252247"></script>
    <script src="../dashboard/js/MonthPicker.js?v=1684252247" type="text/javascript"></script>
    <script src="../source/tour/js/hopscotch.js?v=1684252247"></script>
    <div class="overlay" style="display: none">
        <div class="three-quarters-loader loader-custom">Loading…</div>
    </div>
    <link href="../assets/css/croppie.css" rel="stylesheet" />
    <script src="../assets/js/croppie.js" type="text/javascript"></script>
    <link href="../dashboard/css/select_data_table.css" rel="stylesheet" />
    <link href="../source/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../vendor/spinner-animate/three-quarters.css">
    <link rel="stylesheet" href="../vendor/spinner-animate/custom.css">
    <link rel="stylesheet" href="../source/css/bootstrap-select.min.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.min.js"></script>
    <style>
        @media screen and (min-device-width: 768px) {
            .import-detail {
                width: 650px;
            }
        }

        .popover {
            z-index: 1060;
        }

        .sku-mg {
            margin-right: 10px;
        }

        .button-silver {
            border: 1px solid #00AF81 !important;
            background: #D8FFDA !important;
            color: black !important;
            font-weight: 500;
            font-size: 14;
        }

        .button-putih {
            background: #ffffff;
            border: 1px solid #D1D2D3;
            color: black;
            font-weight: 500;
            font-size: 14;
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

        .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
            width: auto;
            height: 0;
        }

        .btn-group.bootstrap-select .dropdown-menu {
            margin-top: 38px;
        }

        .btn-group>.btn:first-child {
            border: 1px solid #d1d2d3;
            opacity: 0.8;
            color: black;
            border-top-left-radius: 0px;
            border-bottom-left-radius: 0px;
            border-left: none;
            height: 40px;
        }

        .error {
            float: left;
            color: #E21D1D !important;
        }

        .input-group-addon {
            opacity: 0.7;
        }

        .has-error .form-control,
        .form-control.error,
        .has-error .form-control:focus {
            border-color: #E21D1D !important;
        }

        table.dataTable tbody td.select-checkbox:before {
            width: 15px;
            height: 15px;
        }

        table.dataTable tr.selected td.select-checkbox:after {
            margin-top: -7px;
        }

        .swal2-modal .swal2-title,
        .swal2-html-container {
            font-size: 14px !important;
            color: black;
        }

        .dropdown-item {
            display: block;
            width: 100%;
            padding: 0.25rem 1.5rem;
            clear: both;
            text-align: inherit;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
        }

        .dropdown-item:hover {
            color: #00AF81;
        }

        .nav-pills {
            margin-left: 20%;
        }

        .nav-pills>li {
            width: 170px;
            text-align: center;
        }

        .nav-pills>li>a {
            border: 1px solid #d1d2d3;
            color: #606060;
            font-weight: 500;
            cursor: pointer;
        }

        .nav-link.active,
        .nav-link.active:focus,
        .nav-link.active:hover {
            background: #00AF81;
            color: #ffffff !important;
            border: 1px solid #00AF81;
        }

        .nav-link {
            background: #ffffff;
            width: auto;
        }
    </style>
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

                    <?php if ($_SESSION['posisi'] == 'admin' || $_SESSION['posisi'] == 'pemilik' || $_SESSION['posisi'] == 'Admin' || $_SESSION['posisi'] == 'Pemilik') { ?>
                        <li class="">
                            <a href="../account/monitoring.php">
                                <p class="upper-text">Dashboard</p>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if ($_SESSION['posisi'] == 'pemilik' || $_SESSION['posisi'] == 'kasir' || $_SESSION['posisi'] == 'Pemilik' || $_SESSION['posisi'] == 'Kasir') { ?>
                        <li class="">
                            <a href="../account/Kasir.php">
                                <p class="upper-text">Kasir</p>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if ($_SESSION['posisi'] == 'admin' || $_SESSION['posisi'] == 'gudang' || $_SESSION['posisi'] == 'Pemilik' || $_SESSION['posisi'] == 'Admin' || $_SESSION['posisi'] == 'Gudang' || $_SESSION['posisi'] == 'pemilik') { ?>
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























            <script src="../source/js/select2.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.0-rc.4/dist/js.cookie.min.js"
                integrity="sha256-srkrqNQxQ5PTxynPlMErZaHbKkH7Z2slLwYPjq/dLv0=" crossorigin="anonymous"></script>


            <div class="padd-main bg-main" id="get_checkbox">
                <div class="d-flex">
                    <div style="flex: 1">
                        <span class="font-18 semi-bold font-black">Barang atau Jasa</span><br>
                        <span class="font-14 medium font-gray-bold">Database / Barang atau Jasa</span>
                    </div>
                    <div>
                        <a href="../account/database?guide=true" class="font-14 medium font-green" id="goTutor"
                            style="display: none;">Tutorial</a>
                    </div>
                </div>
                <div class="card padd-card margin-top-20">
                    <div class="row">
                        <div class="col-md-9">
                            <button class="btn button-primer" data-toggle="modal" data-target="#inputBarang">Tambah
                                Produk</button>


                            <button class="btn button-merah" type="button" id="btnHapus" data-toggle="modal" data-target="#hapusBarang"
                                style="display: none;">
                                Hapus Barang Terpilih</button>
                        </div>
                        <div class="col-md-3 mt-mobile">
                            <div class="input-group">
                                <input type="search" id="myInputTextField" placeholder="Cari Barang atau Jasa"
                                    class="form-control wt-100">
                                <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- small modal -->
                <div>
                    <div class="center_panel panel-table" id="dtable">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                            <div class="dataTables_scroll">
                                <div class="dataTables_scrollHead"
                                    style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                                    <div class="dataTables_scrollHeadInner"
                                        style="box-sizing: content-box; width: 100%; padding-right: 0px;">
                                        <table class="table datatable mdl-data-table dataTable no-footer" cellspacing="0"
                                            nwidth="100%" role="grid" style="width: 100%; float: left; margin-left: 0px;">
                                            <thead class="tb-border">
                                                <tr role="row">
                                                    <td class="tb-head select-checkbox sorting_disabled" rowspan="1"
                                                        colspan="1" style="width: 30px;" aria-label="">
                                                        <input type="checkbox" id="allBarang" class="margin-10-l">
                                                    </td>
                                                    <td class="tb-head sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="Kode: activate to sort column ascending"
                                                        style="width: 154px;">Kode</td>
                                                    <td class="tb-head sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="Nama: activate to sort column ascending"
                                                        style="width: 106px;">Nama</td>
                                                    <td class="tb-head sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="Kategori: activate to sort column ascending"
                                                        style="width: 101px;">Kategori</td>
                                                    <td class="tb-head sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="Harga Jual (Rp): activate to sort column ascending"
                                                        style="width: 177px;">Harga Jual (Rp)</td>
                                                    <td class="tb-head sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="Harga Dasar (Rp): activate to sort column ascending"
                                                        style="width: 196px;">Harga Dasar (Rp)</td>
                                                    <td class="tb-head sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="Stok: activate to sort column ascending"
                                                        style="width: 56px;">Stok</td>
                                                    <td class="tb-head sorting_disabled" rowspan="1" colspan="1"
                                                        aria-label="Aksi" style="width: 126px;">Aksi</td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="dataTables_scrollBody"
                                    style="position: relative; overflow: auto; max-height: calc(100% - 70px); width: 100%;">
                                    <table class="table datatable mdl-data-table dataTable no-footer" cellspacing="0"
                                        nwidth="100%" role="grid" style="width: 100%; float: left;" id="DataTables_Table_0"
                                        aria-describedby="DataTables_Table_0_info">
                                        <thead class="tb-border">
                                            <tr role="row" style="height: 0px;">
                                                <td class="tb-head select-checkbox sorting_disabled" rowspan="1" colspan="1"
                                                    style="width: 30px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"
                                                    aria-label="">
                                                    <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">
                                                        <input type="checkbox" id="allBarang" class="margin-10-l">
                                                    </div>
                                                </td>
                                                <td class="tb-head sorting" aria-controls="DataTables_Table_0" rowspan="1"
                                                    colspan="1" aria-label="Kode: activate to sort column ascending"
                                                    style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 154px;">
                                                    <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">
                                                        Kode</div>
                                                </td>
                                                <td class="tb-head sorting" aria-controls="DataTables_Table_0" rowspan="1"
                                                    colspan="1" aria-label="Nama: activate to sort column ascending"
                                                    style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 106px;">
                                                    <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">
                                                        Nama</div>
                                                </td>
                                                <td class="tb-head sorting" aria-controls="DataTables_Table_0" rowspan="1"
                                                    colspan="1" aria-label="Kategori: activate to sort column ascending"
                                                    style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 101px;">
                                                    <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">
                                                        Kategori</div>
                                                </td>
                                                <td class="tb-head sorting" aria-controls="DataTables_Table_0" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Harga Jual (Rp): activate to sort column ascending"
                                                    style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 177px;">
                                                    <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">
                                                        Harga Jual (Rp)</div>
                                                </td>
                                                <td class="tb-head sorting" aria-controls="DataTables_Table_0" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Harga Dasar (Rp): activate to sort column ascending"
                                                    style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 196px;">
                                                    <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">
                                                        Harga Dasar (Rp)</div>
                                                </td>
                                                <td class="tb-head sorting" aria-controls="DataTables_Table_0" rowspan="1"
                                                    colspan="1" aria-label="Stok: activate to sort column ascending"
                                                    style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 56px;">
                                                    <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">
                                                        Stok</div>
                                                </td>
                                                <td class="tb-head sorting_disabled" rowspan="1" colspan="1"
                                                    aria-label="Aksi"
                                                    style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 126px;">
                                                    <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">
                                                        Aksi</div>
                                                </td>
                                            </tr>
                                        </thead>

                                        <tbody class="font-14">
                                            <?php
                                            if ($total == 0) {
                                                echo "<tr><td colspan='8' class='text-center'>Tidak ada data</td></tr>";
                                               
                                            }
                                            else{
                                            $no = 0;
                                            foreach ($resultBarang as $b) {
                                                $no++;
                                                $oddEven = $no % 2 == 0 ? 'even' : 'odd';
                                            ?>

                                            <tr role="row" class="<?= $oddEven ?>">
                                                <td class="CheckBoxKategori1 select-checkbox" IdBarang = "<?= $b['idBarang'] ?>">
                                                </td>
                                                <td><?= $b['kode'] ?></td>
                                                <td><?= $b['nama'] ?></td>
                                                <td><?= $b['kategori'] ?></td>
                                                <td><?= $b['hargaJual'] ?></td>
                                                <td><?= $b['hargaBeli'] ?></td>
                                                <td><?= $b['stok'] ?></td>
                                                <td>
                                                    <button class="btn button-edit-detail-delete font-green DetailBtn" IdBarang = "<?= $b['idBarang'] ?>"
                                                        >Detail</button>
                                                </td>
                                            </tr>
                                            <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 6 of 6 entries</div> -->
                            <?php
                                $jumlah = $total;
                                if ($jumlah == 0){
                                    $start = 0;
                                }else{
                                    $start = $page * $limit - $limit + 1;
                                }
                                if ($page * $limit > $jumlah) {
                                    $end = $jumlah;
                                } else {
                                    $end = $page * $limit;
                                }
                            
                                echo '<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing ' . $start . ' to ' . $end . ' of ' . $jumlah . ' entries</div>';

                                echo '<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">';
                                echo '<a class="paginate_button previous';
                                if ($page == 1) {
                                    echo ' disabled';
                                }
                                echo '" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="-1" id="DataPrevious">Previous</a>';
                                echo '<span>';
                                echo '<a class="paginate_button current" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">' . $page . '</a>';
                                echo '</span>';
                                echo '<a class="paginate_button next';
                                if ($page >= $jumlahPage) {
                                    echo ' disabled';
                                }
                                echo '" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="-1" id="DataNext">Next</a>';
                                echo '</div>';
                            ?>
                        </div>
                    </div>
                    <div class="right_panel" style="height: 500px; overflow-y: scroll">
                        <div onclick="closeRighSide()" style="float: right; cursor: pointer">
                            <img src="../assets/img/close.png" style="width: 20px;">
                        </div>
                        <div class="right_side" style="margin-top: 30px;">
                        </div>
                    </div>
                </div>

                <footer class="footer fixed-bottom">

                    <div class="container-fluid">
                    </div>
            </div>
            </footer>
        </div>
        <style type="text/css">
            .error {
                color: red;
            }
        </style>


    </div>












    <div class="modal fade" id="inputBarang" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-small ">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="card-title">Tambah Barang</h4>
                </div>
                <form id="form_tambah" action="" method="POST" enctype='multipart/form-data'>
                    <input type="hidden" name="_token" value="4NyPfyAGe5cgs6K9iP4TwZrClFv6i6M5Yxr5HtUO">
                    <div class="modal-body text-center">
                        <div>
                            <div class="row">
                                <div class="col-md-6"><br>
                                    <p class="font-14 font-gray-bold" align="left">Nama*</p>
                                    <input type="text" class="typeahead form-control" placeholder="Min. 3 Huruf"
                                        autocomplete="off" maxlength="80" name="nama_barang" id="cariSKU"
                                        onfocusout="cekNama()">
                                    <p class="font-red medium" align="left" id="nameNull" style="display: none">Nama
                                        Barang Kosong!</p>
                                    <p class="font-red medium" align="left" id="nameMax" style="display: none">
                                        Maksimal 45 Karakter!</p>
                                    <p class="font-red medium" align="left" id="nameMin" style="display: none">
                                        Minimal 3 Karakter!</p>
                                    <p class="font-red medium" align="left" id="nameUsed" style="display: none">
                                        Nama Sudah Digunakan!</p>
                                </div>
                                <div class="col-md-6"><br>
                                    <p class="font-14 font-gray-bold" align="left">Kode*</p>
                                    <input type="search" class="typeahead form-control" placeholder="Min. 3 Huruf"
                                        autocomplete="off" onkeypress="return AvoidSpace(event)" name="kode_barang"
                                        id="cariKode" onfocusout="cekKode()">
                                    <p class="font-red medium" align="left" id="codeNull" style="display: none">Kode
                                        Barang Kosong!</p>
                                    <p class="font-red medium" align="left" id="codeUsed" style="display: none">
                                        Kode Sudah Digunakan!</p>
                                    <p class="font-red medium" align="left" id="codeMax" style="display: none">
                                        Kode Maksimal 20 Karakter!</p>
                                    <p class="font-red medium" align="left" id="codeMin" style="display: none">
                                        Kode Minimal 3 Karakter!</p>
                                </div>
                                <div class="col-md-6"><br>
                                    <p class="font-14 font-gray-bold" align="left">Kategori</p>
                                    <select class="form-control" name="kategori" id="add_kategori" style="width: 100%">
                                        <option value=""></option>
                                        <?php
                                            foreach ($Ketegori as $row) {
                                                echo "<option value='".$row["idKategori"]."'>".$row["namaKategori"]."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-6"><br>
                                    <p class="font-14 font-gray-bold" align="left">Harga Beli*</p>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp </span> <input name="harga_beli" value="0"
                                            id="harga_beli_input" type="text" class="form-control decimal"
                                            onkeypress="return isValid(this, event)" data-rule-required="true"
                                            data-msg-required="Masukkan Harga Beli">
                                    </div>
                                </div>
                                <div class="col-md-6"><br>
                                    <p class="font-14 font-gray-bold" align="left">Harga Jual*</p>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp </span> <input name="harga_jual" value="0"
                                            type="text" id="harga_jual_input" class="form-control decimal"
                                            onkeypress="return isValid(this, event)" data-rule-required="true"
                                            data-msg-required="Masukkan Harga Jual">
                                    </div>
                                </div>
                                <!-- <div class="col-md-6"><br>
                                    <p class="font-14 font-gray-bold" align="left">Jenis Stok (Barang/Jasa)</p>
                                    <select name="barang_jasa" class="form-control" id="setBarangStok" disabled
                                        style="display: none">
                                        <option selected value="0">Barang (Limited Stock) </option>
                                    </select>
                                    <select name="barang_jasa" class="form-control" id="barangJasa">
                                        <option selected value="0">Barang (Limited Stock) </option>
                                        <option value="1">Jasa (Unlimited Stock)</option>
                                    </select>
                                </div> -->
                                <div class="col-md-6"><br>
                                    <p class="font-14 font-gray-bold" align="left">Stok* <span><small
                                                style="color: #606060; display: none" id="ket_stok"></small></span></p>
                                    <input type="text" step="any" value="0" name="stok" id="add_stok"
                                        class="form-control stok" onkeypress="return isValid(this, event)"
                                        data-rule-required="true" data-msg-required="Masukkan Jumlah Stok">
                                </div>
                                <div class="col-md-6"><br>
                                    <p class="font-14 font-gray-bold" align="left">
                                        Satuan</p>
                                    <input type="text" name="berat_dan_satuan" id="IDberat_dan_satuan"
                                        class="form-control" maxlength="80">
                                </div>
                                <div class="col-md-6"><br>
                                    <p class="font-14 font-gray-bold" align="left">Keterangan</p>
                                    <textarea name="keterangan" class="form-control" id="ketBarang" maxlength="255"
                                        rows="10" style="resize: none"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer ">
                    <button type="button" class="btn button-bdr-hj" data-dismiss="modal">batal</button>
                    <button id="submit_tambah" class="btn button-primer pull-right">tambah</button>
                </div>

                <script>
                    function cekKode() {
                        var kode_barang = $('#cariKode').val();

                        if (kode_barang == '') {
                            $('#codeNull').show();
                            $('#cariKode').focus();
                            return false;
                        } else {
                            $('#codeNull').hide();
                        }
                        if (kode_barang.length < 3) {
                            $('#codeMin').show();
                            return false;
                        }
                        else {
                            $('#codeMin').hide();
                        }
                        if (kode_barang.length >= 20) {
                            $('#codeMax').show();
                            $('#cariKode').focus();
                            return false;
                        } else {
                            $('#codeMax').hide();
                        }

                        if (kode_barang.length >= 3 && kode_barang.length < 20) {
                            $.ajax({
                                type: 'POST',
                                url: "Action/database/cekKode.php",
                                data: {
                                    kode_barang: kode_barang
                                }
                            }).done(function (data) {
                                // console.log(data);
                                if (data == 1) {
                                    $('#codeUsed').show();
                                    $('#kode_barang').focus();
                                } else {
                                    $('#codeUsed').hide();
                                }
                            });
                        }
                    }

                    function cekNama() {
                        var nama_barang = $('#cariSKU').val();

                        if (nama_barang == '') {
                            $('#nameNull').show();
                            $('#cariSKU').focus();
                            return false;
                        } else {
                            $('#nameNull').hide();
                        }
                        if (nama_barang.length < 3) {
                            $('#nameMin').show();
                            return false;
                        }
                        else {
                            $('#nameMin').hide();
                        }
                        if (nama_barang.length >= 20) {
                            $('#nameMax').show();
                            $('#cariSKU').focus();
                            return false;
                        } else {
                            $('#nameMax').hide();
                        }

                        if (nama_barang.length >= 3 && nama_barang.length < 20) {
                            $.ajax({
                                type: 'POST',
                                url: "Action/database/cekNama.php",
                                data: {
                                    nama_barang: nama_barang
                                }
                            }).done(function (data) {
                                // console.log(data);
                                if (data == 1) {
                                    $('#nameUsed').show();
                                    $('#nama_barang').focus();
                                } else {
                                    $('#nameUsed').hide();
                                }
                            });
                        }
                    }


                    $('#submit_tambah').click(function () {
                        // name="nama_barang"
                        var nama_barang = $('#cariSKU').val();
                        var kode_barang = $('#cariKode').val();
                        // add_kategori
                        var add_kategori = $('#add_kategori').val();
                        var harga_beli_input = $('#harga_beli_input').val();
                        var harga_jual_input = $('#harga_jual_input').val();
                        var add_stok = $('#add_stok').val();
                        var IDberat_dan_satuan = $('#IDberat_dan_satuan').val();
                        var ketBarang = document.getElementById("ketBarang").value;

                        $.ajax({
                            type: 'POST',
                            url: "Action/database/tambahBarang.php",
                            data: {
                                nama_barang: nama_barang,
                                kode_barang: kode_barang,
                                add_kategori: add_kategori,
                                harga_beli_input: harga_beli_input,
                                harga_jual_input: harga_jual_input,
                                add_stok: add_stok,
                                IDberat_dan_satuan: IDberat_dan_satuan,
                                ketBarang: ketBarang
                            }
                        }).done(function (data) {
                            // console.log(data);
                            location.reload();
                        });
                    });

                </script>

            </div>
        </div>
    </div>
    </div>



    <div class="modal fade" id="hapusBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-small ">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="card-title">Peringatan</h4>
                </div>
                <div class="modal-body text-center">
                    <div class="card-content">
                        <p class="font-14 medium font-gray-bold">Apakah Anda yakin akan menghapus produk?</p>
                        <p class="font-14 medium font-white" id="detailBulkRemove"
                            style="background: #EB5757; border-radius: 8px; padding-top: 10px; padding-bottom: 10px;">
                        </p>
                    </div>
                    <div class="mouse" style="background: #EFF3F6; padding-top: 8px; padding-bottom: 8px;">
                        <label for="isDelete" class="font-14 medium font-black">
                            <input type="checkbox" id="isDelete"
                                onclick="if ($(this).is(':checked')) { $('#hapus_barang').prop('disabled', false) } else { $('#hapus_barang').prop('disabled', true) }">
                            &nbsp; <span id="yakin">Saya telah membaca peringatan dan yakin untuk menghapus
                                produk</span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn button-feature" data-dismiss="modal">Batal</button>
                    <button type="button" id="hapus_barang" class="btn button-remove" disabled
                        data-dismiss="modal">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="hapusBarangKode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-small ">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="card-title">Apakah Anda yakin akan menghapus produk?</h4>
                </div>
                <div class="modal-body text-center">
                    <div class="card-content">
                        <p class="font-14 medium font-gray-bold">Produk yang sudah terhapus tidak dapat dikembalikan
                            lagi</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn button-feature" data-dismiss="modal">Batal</button>
                    <a href="#" id="btnRemoveProduct" class="btn button-remove">Hapus</a>
                </div>
                <script>
                    // kode

                    // btnRemoveProduct
                    $('#btnRemoveProduct').click(function () {
                        // span class kode 
                        var idB = document.getElementById("KodeBarangId").innerHTML;
                        var idBarang = []
                        idBarang.push(idB);
                        // console.log(idBarang);
                        $.ajax({
                            type: 'POST',
                            url: "Action/database/hapusBarang.php",
                            data: {
                                idBarang: idBarang
                            }
                        }).done(function (data) {
                            // console.log(data);
                            location.reload();
                        });
                    });
                </script>
            </div>
        </div>
    </div>

    <div class="modal fade" id="hapusBarangReset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-small ">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="card-title">Informasi</h4>
                </div>
                <div class="modal-body text-center">
                    <div class="card-content">
                        <p class="font-14 medium font-gray-bold">Penghapusan Data Barang secara massal dapat dilakukan
                            melalui Reset Data</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn button-feature" data-dismiss="modal">Batal</button>
                    <a href="../account/pengaturan" class="btn button-primer">Ke Halaman Reset
                        Data</a>

                </div>
            </div>
        </div>
    </div>

    <!--  Bootstrap Table Plugin    -->
    <script src="../source/js/select2.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>


    <script>
        $(".CheckBoxKategori1").click(function(){
            if($(this).parent().hasClass("selected")){
                $(this).parent().removeClass("selected");
            } else {
                $(this).parent().addClass("selected");
            }
        });

        $(document).on("click", ".CheckBoxKategori1", function(){
            var selected = $(".selected").length;
            if(selected > 0){
                $("#btnHapus").css("display", "inline-block");
            } else {
                $("#btnHapus").css("display", "none");
            }
        });
        $("#hapus_barang").click(function(){
            var idBarang = [];
            $(".selected").each(function(){
                idBarang.push($(this).find("td").attr("IdBarang"));
            });
            console.log(idBarang);
            $.ajax({
                url : "Action/database/hapusBarang.php",
                type : "POST",
                data : {idBarang : idBarang}
            }).done(function(res){
                // console.log(res);
                location.reload();
            });
        });
    </script>



    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>



</body>
<!--   Core JS Files   -->
<script src="../dashboard/js/bootstrap.min.js?v=1684252247" type="text/javascript"></script>
<!--  Checkbox, Radio & Switch Plugins -->
<script src="../dashboard/js/bootstrap-checkbox-radio-switch.js?v=1684252247"></script>

<!--  Notifications Plugin    -->
<script src="../dashboard/js/bootstrap-notify.js?v=1684252247"></script>

<!--  Select Plugin    -->
<script src="../dashboard/js/bootstrap-selectpicker.js?v=1684252247"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="../dashboard/js/light-bootstrap-dashboard.js?v=1684252247"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="../dashboard/js/demo.js?v=1684252247"></script>
<script src="../js/sorttable.js?v=1684252247" type="text/javascript"></script>
<script src="../vendor/toastr/toastr.min.js?v=1684252247"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
        const boxes = document.querySelectorAll('#dtable');

        const myObserver = new ResizeObserver(entries => {
            for (let entry of entries) {
                const infoEl = entry.target.querySelector('.right_side');
                const width = Math.floor(entry.contentRect.width);
                const height = Math.floor(entry.contentRect.height);
                document.querySelector(".right_side").style.height = height - 40;
            }
        });

        boxes.forEach(box => {
            myObserver.observe(box);
        });

        function makeHttpObject() {
            try {
                console.log("try");
                return new XMLHttpRequest();
            } catch (error) {}
            try {
                return new ActiveXObject("Msxml2.XMLHTTP");
            } catch (error) {}
            try {
                return new ActiveXObject("Microsoft.XMLHTTP");
            } catch (error) {}

            throw new Error("Could not create HTTP request object.");
        }

        function openRighSide() {
            if (document.querySelector(".right_panel").offsetWidth == 0) {
                if (window.innerWidth <= 990) {
                    document.querySelector(".right_panel").style.width = "100%";
                    document.querySelector(".center_panel").style.display = "none";
                } else {
                    document.querySelector(".right_panel").style.width = "50%";
                    document.querySelector(".center_panel").style.width = "50%";
                }
                document.querySelector(".right_panel").style.display = 'block';
            }
        }

        function closeRighSide() {
            if (document.querySelector(".right_panel").offsetWidth > 0) {
                document.querySelector(".center_panel").style.display = "block";
                document.querySelector(".right_panel").style.display = 'none';
                document.querySelector(".right_panel").style.width = "0%";
                document.querySelector(".center_panel").style.width = "100%";
            }
        }

        // function getUrl(url) {
        //     document.querySelector(".right_side").innerHTML = "";
        //     openRighSide();
        //     var request = makeHttpObject();
        //     request.open("GET", url, true);
        //     request.send(null);
        //     request.onreadystatechange = function() {
        //         if (request.responseURL == window.location.origin + '/login') {
        //             window.location.href = "/login";
        //             document.querySelector(".right_side").innerHTML = '';
        //         } else {
        //             if (request.readyState == 4)
        //                 document.querySelector(".right_side").innerHTML = request.responseText;
        //         }
        //     };
        //     hopscotch.nextStep();
        // }

        $(".DetailBtn").click(function() {
                idKategori = $(this).attr('IdBarang');
                console.log(idKategori);
                var currentUrl = window.location.href;
                var url = 'Action/pageDatabase/DetailBarang.php?id=' + idKategori;
                // replace kategori.php frim currentUrl
                var newUrl = currentUrl.replace('database.php', url);
                url = newUrl;
                // url = "Action/pageDatabase/DetailBarang.php"
                console.log(url);
                var httpRequest = new XMLHttpRequest();
                httpRequest
                httpRequest.open("GET", url, true);
                httpRequest.send();
                httpRequest.onreadystatechange = function() {
                    if (httpRequest.readyState === XMLHttpRequest.DONE) {
                        if (httpRequest.status === 200) {
                            // console.log("Successfully loaded page: " + url);
                            openRighSide();
                            document.querySelector(".right_side").innerHTML = httpRequest.responseText;
                        } 
                    }
                };
                // httpRequest.open("GET", url, true);
                // httpRequest.send();
            });

</script>


<script>
    feather.replace()
</script>
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























































































<script src="../source/js/platform.js?onload=onLoad" async defer></script>

</html>
