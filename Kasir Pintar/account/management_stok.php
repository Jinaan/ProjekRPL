<?php
    session_start(); 
    if (!isset($_SESSION['email'])) {
        header("Location: ../login.php");
    }
?>
<?php
    include '../assets/util/koneksi.php';
    $limit = 25;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;
    $sql = "SELECT * FROM barang LIMIT $start, $limit";
    $result = mysqli_query($koneksi, $sql);
    $all = mysqli_query($koneksi, "SELECT * FROM barang");
    $total = mysqli_num_rows($all); //total data
    $pages = ceil($total / $limit); //total pages
    $Previous = $page - 1;
    $Next = $page + 1;
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
    <link rel="stylesheet" href="../vendor/spinner-animate/three-quarters.css?v=1684254391">
    <link rel="stylesheet" href="../vendor/spinner-animate/custom.css?v=1684254391">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../source/js/raphael-min.js?v=1684254391"></script>
    <script src="../dashboard/js/jquery-1.10.2.js?v=1684254391" type="text/javascript"></script>
    <script src="../source/js/jquery-ui.min.js?v=1684254391"></script>
    <script src="../dashboard/js/morris.js?v=1684254391" type="text/javascript"></script>
    <script type="text/javascript" src="../js/vue.min.js"></script>
    <script src="../js/intlTelInput.js?v=1684254391"></script>
    <script src="../dashboard/js/MonthPicker.js?v=1684254391" type="text/javascript"></script>
    <div class="overlay" style="display: none">
        <div class="three-quarters-loader loader-custom">Loading…</div>
    </div>
    <link href="../dashboard/css/select_data_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="../vendor/spinner-animate/three-quarters.css">
    <link rel="stylesheet" href="../vendor/spinner-animate/custom.css">
    <style>
        table.dataTable tbody td.select-checkbox:before {
            width: 15px;
            height: 15px;
        }

        table.dataTable tr.selected td.select-checkbox:after {
            margin-top: -7px;
        }
    </style>
    <div class="overlay" style="display: none">
        <div class="three-quarters-loader loader-custom">Loading…</div>
    </div>
    <div class="wrapper" id="get_checkbox">
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


                <div class="padd-main">
                    <span class="font-18 semi-bold font-black">Manajemen Stok</span><br>
                    <span class="font-14 medium font-gray-bold">Database / Manajemen Stok</span>
                    <div class="card padd-card margin-top-20">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="search" id="myInputTextField" placeholder="Cari Barang atau Jasa"
                                        class="form-control wt-100" onkeyup="searchKategori()">
                                    <span class="input-group-addon"><i class="fa fa-search"
                                            aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="center_panel panel-dataTable" id="dtable">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input
                                        type="search" class="" placeholder=""
                                        aria-controls="DataTables_Table_0"></label></div>
                            <div class="dataTables_scroll">
                                <div class="dataTables_scrollHead"
                                    style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                                    <div class="dataTables_scrollHeadInner"
                                        style="box-sizing: content-box; width: 1628px; padding-right: 0px;">
                                        <table class="table datatable mdl-data-table dataTable no-footer" role="grid"
                                            style="margin-left: 0px; width: 1628px;">
                                            <thead class="tb-border">

                                                <tr role="row">
                                                    <!-- <td class="sorting_disabled" rowspan="1" colspan="1"
                                                        style="width: 88px;" aria-label=""></td> -->
                                                    <td class="tb-head sorting_disabled" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 192px;"
                                                        aria-label="Kode: activate to sort column ascending">Kode</td>
                                                    <td class="tb-head sorting_disabled" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 133px;"
                                                        aria-label="Nama: activate to sort column ascending">Nama</td>
                                                    <td class="tb-head sorting_disabled" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 127px;"
                                                        aria-label="Kategori: activate to sort column ascending">
                                                        Kategori</td>
                                                    <td class="tb-head sorting_disabled" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 72px;"
                                                        aria-label="Stok: activate to sort column ascending">Stok</td>
                                                    <td class="tb-head sorting_disabled" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 219px;"
                                                        aria-label="Harga Jual (Rp): activate to sort column ascending">
                                                        Harga Jual (Rp)</td>
                                                    <td class="tb-head sorting_disabled" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 243px;"
                                                        aria-label="Harga Dasar (Rp): activate to sort column ascending">
                                                        Harga Dasar (Rp)</td>
                                                    <td data-click-to-select="false" class="sorting_disabled"
                                                        rowspan="1" colspan="1" style="width: 150px;" aria-label="">
                                                    </td>
                                                    <td data-click-to-select="false" class="tb-head sorting_disabled"
                                                        rowspan="1" colspan="1" style="width: 128px;" aria-label="Aksi">
                                                        Aksi</td>
                                                    
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="dataTables_scrollBody"
                                    style="position: relative; overflow: auto; max-height: calc(100% - 70px); width: 100%;">
                                    <table class="table datatable mdl-data-table dataTable no-footer"
                                        id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info"
                                        style="width: 100%;">
                                        <thead class="tb-border">

                                            <tr role="row" style="height: 0px;">
                                                <td class="sorting_disabled" rowspan="1" colspan="1"
                                                    style="width: 192px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"
                                                    aria-label="">
                                                    <div class="dataTables_sizing"
                                                        style="height: 0px; overflow: hidden;"></div>
                                                </td>
                                                <td class="tb-head sorting_disabled" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 133px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"
                                                    aria-label="Kode: activate to sort column ascending">
                                                    <div class="dataTables_sizing"
                                                        style="height: 0px; overflow: hidden;">Kode</div>
                                                </td>
                                                <td class="tb-head sorting_disabled" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 127px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"
                                                    aria-label="Nama: activate to sort column ascending">
                                                    <div class="dataTables_sizing"
                                                        style="height: 0px; overflow: hidden;">Nama</div>
                                                </td>
                                                <td class="tb-head sorting_disabled" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 72px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"
                                                    aria-label="Kategori: activate to sort column ascending">
                                                    <div class="dataTables_sizing"
                                                        style="height: 0px; overflow: hidden;">Kategori</div>
                                                </td>
                                                <td class="tb-head sorting_disabled" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 219px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"
                                                    aria-label="Stok: activate to sort column ascending">
                                                    <div class="dataTables_sizing"
                                                        style="height: 0px; overflow: hidden;">Stok</div>
                                                </td>
                                                <td class="tb-head sorting_disabled" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 243px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"
                                                    aria-label="Harga Jual (Rp): activate to sort column ascending">
                                                    <div class="dataTables_sizing"
                                                        style="height: 0px; overflow: hidden;">Harga Jual (Rp)</div>
                                                </td>
                                                <td class="tb-head sorting_disabled" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    style="width: 150px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"
                                                    aria-label="Harga Dasar (Rp): activate to sort column ascending">
                                                    <div class="dataTables_sizing"
                                                        style="height: 0px; overflow: hidden;">Harga Dasar (Rp)</div>
                                                </td>
                                                <td data-click-to-select="false" class="sorting_disabled" rowspan="1"
                                                    colspan="1"
                                                    style="width: 128px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"
                                                    aria-label="">
                                                    <div class="dataTables_sizing"
                                                        style="height: 0px; overflow: hidden;"></div>
                                                </td>
                                            </tr>
                                        </thead>

                                        <tbody class="font-14">

                                            <?php 
                                            if (!empty($result)) {
                                                foreach ($result as $barangg) {
                                                    echo "<tr class='odd'>";
                                                    echo "<td>".$barangg['kode']."</td>";
                                                    echo "<td>".$barangg['nama']."</td>";
                                                    echo "<td>".$barangg['kategori']."</td>";
                                                    echo "<td>".$barangg['stok']."</td>";
                                                    echo "<td>".$barangg['hargaJual']."</td>";
                                                    echo "<td>".$barangg['hargaBeli']."</td>";
                                                    echo "<td><button class='btn button-edit-detail-delete font-black UbahBtn' idBarang=".$barangg['idBarang']." >Ubah</button></td>";
                                                    echo "<td><button class='btn button-edit-detail-delete font-green DetailBtn' idBarang=".$barangg['idBarang']." >Detail</button></td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr class='odd'>";
                                                echo "<td colspan='9' style='text-align: center;'>Tidak ada data</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php 
                                $jumlah = $total;
                                $awal = $page * $limit - $limit + 1;
                                if ($page * $limit > $jumlah) {
                                    $akhir = $jumlah;
                                } else {
                                    $akhir = $page * $limit;
                                }
                                echo "<div class='dataTables_info' id='DataTables_Table_0_info' role='status' aria-live='polite'>Showing $awal to $akhir of $jumlah entries</div>";
                            ?>
                            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                <!-- <a class="paginate_button previous disabled" aria-controls="DataTables_Table_0"
                                    data-dt-idx="0" tabindex="-1" id="DataTables_Table_0_previous">Previous</a> -->
                                <span>
                                    <?php
                                        if ($page > 1) {
                                            $prev = $page - 1;
                                            echo "<a class='paginate_button previous' aria-controls='DataTables_Table_0' data-dt-idx='1' tabindex='0' onclick='getUrl(\"../account/management_stok/$prev\")'>Previous</a>";
                                        } 
                                        else {
                                            echo "<a class='paginate_button previous disabled' aria-controls='DataTables_Table_0' data-dt-idx='1' tabindex='0' id='DataTables_Table_0_previous'>Previous</a>";
                                        }
                                    ?>
                                <span>
                                    <?php
                                        echo "<a class='paginate_button current' aria-controls='DataTables_Table_0' data-dt-idx='1' tabindex='0'>$page</a>";
                                    ?>
                                </span>
                                <span>
                                    <?php
                                        if ($page * $limit < $jumlah) {
                                            $next = $page + 1;
                                            echo "<a class='paginate_button next' aria-controls='DataTables_Table_0' data-dt-idx='2' tabindex='0' onclick='getUrl(\"../account/management_stok/$next\")'>Next</a>";
                                        } 
                                        else {
                                            echo "<a class='paginate_button next disabled' aria-controls='DataTables_Table_0' data-dt-idx='2' tabindex='0' id='DataTables_Table_0_next'>Next</a>";
                                        }
                                    ?>
                                <!-- <a class="paginate_button next disabled" aria-controls="DataTables_Table_0"
                                    data-dt-idx="2" tabindex="-1" id="DataTables_Table_0_next">Next</a> -->
                            </div>
                        </div>

                    </div>
                    <div class="right_panel bg-white">
                        <div onclick="closeRighSide()">
                            <img src="../assets/img/close.png" style="width: 12px;">
                        </div>
                        <div class="right_side">

                        </div>
                    </div>
                </div>
            </div>
            <style type="text/css">
                .error {
                    color: red;
                }
            </style>
        </div>

    </div>


    <script src="../dashboard/js/bootstrap-table.js"></script>
<script>
    // myInputTextField
    function searchKategori(){
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInputTextField");
        filter = input.value.toUpperCase();
        table = document.getElementById("dtable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            // console.log(tr[i]);
            td = tr[i].getElementsByTagName("td")[1];
            // console.log(td);
            if (td) {
                txtValue = td.textContent || td.innerText;
                // console.log(txtValue);
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    // console.log("masuk");
                } else {
                    tr[i].style.display = "none";
                    // console.log("ga masuk");
                }
            }
        }
    }
</script>

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

    // UbahBtn
    $(".UbahBtn").click(function() {
        document.querySelector(".right_side").innerHTML = "";
        var request = makeHttpObject();
        var idBarang = $(this).attr('idBarang');
        // console.log(idBarang);
        var currentUrl = window.location.href;
        var url = 'Action/management/EditStock.php?id=' + idBarang;
        // console.log(url);
        // replace kategori.php frim currentUrl
        var newUrl = currentUrl.replace('management_stok.php', url);
        url = newUrl;
        // console.log(url);
        request.open("GET", url, true);
        request.send(null);
        request.onreadystatechange = function() {
            if (request.readyState === request.DONE) {
                if (request.status === 200) {
                        openRighSide();
                    document.querySelector(".right_side").innerHTML = request.responseText;
                }
            }
        };
    });

    //DetailBtn
    $(".DetailBtn").click(function() {
        document.querySelector(".right_side").innerHTML = "";
        var request = makeHttpObject();
        var idBarang = $(this).attr('idBarang');
        // console.log(idBarang);
        var currentUrl = window.location.href;
        var url = 'Action/management/DetailStock.php?id=' + idBarang;
        // replace kategori.php frim currentUrl
        var newUrl = currentUrl.replace('management_stok.php', url);
        url = newUrl;
        request.open("GET", url, true);
        request.send(null);
        request.onreadystatechange = function() {
            if (request.readyState === request.DONE) {
                if (request.status === 200) {
                        openRighSide();
                    document.querySelector(".right_side").innerHTML = request.responseText;
                }
            }
        };
    });

    function getUrlDetail() {
        document.querySelector(".right_side").innerHTML = "";
        var request = makeHttpObject();
        var idBarang = $(this).attr('idBarang');
        // console.log(idBarang);
        var currentUrl = window.location.href;
        var url = 'Action/DetailStock.php?id=' + idBarang;
        // replace kategori.php frim currentUrl
        var newUrl = currentUrl.replace('management_stock.php', url);
        url = newUrl;
        request.open("GET", url, true);
        request.send(null);
        request.onreadystatechange = function() {
            if (request.readyState === request.DONE) {
                if (request.status === 200) {
                        openRighSide();
                    document.querySelector(".right_side").innerHTML = request.responseText;
                }
            }
        };
    }
</script>

<script>
    function tambahStock(){
        var idBarang = document.querySelector("input[name=idBarang]").value;
        var hargaBeli = document.querySelector("input[name=harga_beli]").value;
        var jumlah = document.querySelector("input[name=jumlah]").value;
        // check if value is empty
        if(hargaBeli == "" || jumlah == ""){
            alert("Mohon isi semua data");
            return;
        }
        // check if value is not a number
        if(isNaN(hargaBeli) || isNaN(jumlah)){
            alert("Mohon isi data dengan angka");
            return;
        }
        // check if value is not a positive number
        if(hargaBeli <= 0 || jumlah <= 0){
            alert("Mohon isi data dengan angka positif");
            return;
        }
        // check if value is not a decimal number
        if(hargaBeli % 1 != 0 || jumlah % 1 != 0){
            alert("Mohon isi data dengan angka bulat");
            return;
        }
        // check if value is symbol
        if(hargaBeli.includes("+") || hargaBeli.includes("-") || hargaBeli.includes("*") || hargaBeli.includes("/") || hargaBeli.includes("%") || hargaBeli.includes("=") || hargaBeli.includes("!") || hargaBeli.includes("@") || hargaBeli.includes("#") || hargaBeli.includes("$") || hargaBeli.includes("^") || hargaBeli.includes("&") || hargaBeli.includes("(") || hargaBeli.includes(")") || hargaBeli.includes("_") || hargaBeli.includes("-") || hargaBeli.includes("+") || hargaBeli.includes("=") || hargaBeli.includes("{") || hargaBeli.includes("}") || hargaBeli.includes("[") || hargaBeli.includes("]") || hargaBeli.includes("|") || hargaBeli.includes(":") || hargaBeli.includes(";") || hargaBeli.includes("'") || hargaBeli.includes("<") || hargaBeli.includes(">") || hargaBeli.includes(",") || hargaBeli.includes(".") || hargaBeli.includes("?") || hargaBeli.includes("/") || hargaBeli.includes("`") || hargaBeli.includes("~")){
            alert("Mohon isi data dengan angka");
            return;
        }
        // submit form via ajax
        var form = document.querySelector("form");
        var data = new FormData(form);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "Action/management/IncreaseStockBarang.php");
        xhr.send(data);
        xhr.onload = function(){
            if(xhr.status == 200){
                // alert("Berhasil menambahkan stok");
                location.reload();
            }
            else{
                alert("Gagal menambahkan stok");
            }
        }
    }
</script>

<script>
    function kurangiStock(){
        var jumlah = document.querySelector("input[name=jumlah]").value;
        var idBarang = document.querySelector("input[name=idBarang]").value;
        if (jumlah == "" || idBarang == "") {
            alert("Mohon isi semua data");
            return;
        }
        if (isNaN(jumlah)) {
            alert("Mohon isi data dengan angka");
            return;
        }
        if (jumlah <= 0) {
            alert("Mohon isi data dengan angka positif");
            return;
        }
        if (jumlah % 1 != 0) {
            alert("Mohon isi data dengan angka bulat");
            return;
        }
        if (jumlah.includes("+") || jumlah.includes("-") || jumlah.includes("*") || jumlah.includes("/") || jumlah.includes("%") || jumlah.includes("=") || jumlah.includes("!") || jumlah.includes("@") || jumlah.includes("#") || jumlah.includes("$") || jumlah.includes("^") || jumlah.includes("&") || jumlah.includes("(") || jumlah.includes(")") || jumlah.includes("_") || jumlah.includes("-") || jumlah.includes("+") || jumlah.includes("=") || jumlah.includes("{") || jumlah.includes("}") || jumlah.includes("[") || jumlah.includes("]") || jumlah.includes("|") || jumlah.includes(":") || jumlah.includes(";") || jumlah.includes("'") || jumlah.includes("<") || jumlah.includes(">") || jumlah.includes(",") || jumlah.includes(".") || jumlah.includes("?") || jumlah.includes("/") || jumlah.includes("`") || jumlah.includes("~")) {
            alert("Mohon isi data dengan angka");
            return;
        }
        var form = document.querySelector("form");
        var data = new FormData(form);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "Action/management/DecreaseStockBarang.php");
        xhr.send(data);
        xhr.onload = function(){
            if(xhr.status == 200){
                // console.log(xhr.responseText);
                // alert("Berhasil mengurangi stok");
                location.reload();
            }
            else{
                // alert("Gagal mengurangi stok");
            }
        }
    }
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

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>



</body>
<!--   Core JS Files   -->
<script src="../dashboard/js/bootstrap.min.js?v=1684254391" type="text/javascript"></script>


<!--  Select Plugin    -->
<script src="../dashboard/js/bootstrap-selectpicker.js"></script>



<script src="../source/js/platform.js?onload=onLoad" async defer></script>
<script>
        var firstLi = document.querySelector(".firstLi");
        var secondLi = document.querySelector(".secondLi");

        $(document).ready(function() {
            $(".firstLi").click(function() {
                $(".firstLi").addClass("active");
                $(".secondLi").removeClass("active");

            });
            $(".secondLi").click(function() {
                $(".secondLi").addClass("active");
                $(".firstLi").removeClass("active");
            });
        });
</script>
<script>
    function tambahTab(){
        var tambahForm = document.querySelector(".tambahForm");
        var kurangForm = document.querySelector(".kurangForm");
        tambahForm.style.display = "block";
        kurangForm.style.display = "none";
    }
    function kurangTab(){
        var tambahForm = document.querySelector(".tambahForm");
        var kurangForm = document.querySelector(".kurangForm");
        tambahForm.style.display = "none";
        kurangForm.style.display = "block";
    }
</script>
</html>
